@extends('partials.app')
@section('title', 'Categories')
@section('content')
        <div class="container py-4 my-5">
            
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark p-5 mb-5">
                        <div class="row no-gutters">
                            <div class="col-xl-6 border-right border-lg-0 pr-0 pr-xl-5">
                                <h1 class="text-white add-letter-space">Category Management</h1>
                                <div class="breadcrumb-wrap mt-3">
                                    <a href="index.html">Dashboard</a>
                                    <span>/</span>
                                    <span>Category</span>
                                </div>
                            </div>
                            <div class="col-xl-6 pl-0 pl-xl-5 mt-4 mt-xl-0">
                                <div class="categores-links text-capitalize">
                                    <h3 class="text-white add-letter-space mb-3">More Categores:</h3>
                                    <a class="border" href="#!">non quiens</a>
                                    <a class="border" href="#!">couat enim</a>
                                    <a class="border" href="#!">adicing enim</a>
                                    <a class="border" href="#!">quis consect</a>
                                    <a class="border" href="#!">aute non</a>
                                    <a class="border" href="#!">labois except</a>
                                    <a class="border" href="#!">labore nulla</a>
                                    <a class="border" href="#!">non quiens</a>
                                    <a class="border" href="#!">adicing enim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-danger text-center my-3 pb-3" data-toggle="modal" data-target="#AddModal">Add New Category</button>
            
            <table class="table mb-4 text-light">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Category</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->name}}</td>
                  <td>In progress</td>
                    <td>
                      <div class="row">
                        <form method="POST" action="/categories/{{$category->id}}">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-success ms-1" data-toggle="modal" data-target="#EditModal{{$category->id}}">Edit</button>
                        <!-- Modal -->
                        <div class="modal fade" id="EditModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Category</h5>
                                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="/categories/{{$category->id}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label text-dark">Category Name:</label>
                                            <input type="text" class="form-control" value="{{$category->name}}" name="category" id="category">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach  
              </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/categories">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" name="category" id="category">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>

@endsection

