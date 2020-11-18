@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-primary">Artigo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($contents as $item)
                            @can('view', $item)
                            
                            <tr>
                              <th scope="row">{{$item->id}}</th>
                              <td>{{$item->title}}</td>
                              <td>
                                 <img class="img-fluid" src="{{$item->image}}" alt="" width="30" height="20">
                              </td>
            
                              <td>
                                <a href="{{route('contents.edit',$item->id)}}">
                                  <i class="far fa-edit"></i>
                                </a>
                                <a href="#">
                                  <!-- Button trigger modal -->
                                  <i class="fas fa-trash-alt"  data-toggle="modal" data-target="#deleteModal{{$item->id}}"></i>
                                </a>
                              </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="deleteModalLabel">Excluir Artigo</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Deseja excluir o artigo código [ {{$item->id}} ] ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                      <form method="Post" action="{{route('contents.destroy',$item->id)}}">
                                         @csrf
                                         @method('Delete')
                                         <button type="submit" class="btn btn-danger">Excluir</button>
                                      </form> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- # Modal -->
                             @endcan  
                          @endforeach
                        
                        </tbody>
                      </table>
                      {{ $contents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection