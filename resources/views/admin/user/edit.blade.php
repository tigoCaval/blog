@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-primary">Editar Perfil</div>
                <div class="card-body">
                    <!-- Mensagens de erros -->
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <p class="alert alert-danger"> 
                            {{$error}}
                            </p> 
                        @endforeach
                    @endif
                
                     <form method="Post" action="{{route('users.update',$user->id)}}">
                        @csrf
                        @method('Put')

                        <div class="form-group">
                            <label for="labelName">Nome Completo</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Inserir nome" value="{{$user->name}}">
                        </div> 

                        <div class="form-group">
                            <label for="labelDescription">Foto</label>
                            <input type="text" class="form-control" name="photo" autocomplete="off" placeholder="Inserir a url da imagem" value="{{$user->photo}}">
                        </div> 
  
                        <div class="form-group">
                          <label for="labelDescription">Descrição</label>
                          <textarea class="form-control" cols="20" rows="3" name="description" autocomplete="off" placeholder="Inserir descrição">{{$user->description}}</textarea>
                        </div> 

                        <div class="form-group">
                            <label for="labelDescription">Deseja alterar a senha?</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Inserir nova senha">
                        </div> 

                        <button type="submit" class="btn btn-primary">Salvar</button>
                     </form>
                  
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection