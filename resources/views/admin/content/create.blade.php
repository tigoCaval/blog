@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-primary">Cadastrar Artigo</div>
                <div class="card-body">
                    <!-- Mensagens de erros -->
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <p class="alert alert-danger"> 
                            {{$error}}
                            </p> 
                        @endforeach                    
                    @endif

                    <!-- $_SESSION SUCCESS -->
                    @if(session('success'))
                        <div class="alert alert-success">
                           {{session('success')}}   
                        </div>
                    @endif                 

                
                   <form method="Post" action="{{route('contents.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="sectionSelect1">Escolher Seção</label>
                            <select class="form-control" id="sectionFk" name="section_id"> 
                              <option value="">Selecionar Seção</option>
                              @foreach ($sections as $item)
                                <option value="{{$item->id}}">{{$item->description}}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="labelTitle">Título</label>
                            <input type="text" class="form-control" id="inputTitle" name="title" autocomplete="off" placeholder="Inserir título">
                        </div>

                        <div class="form-group">
                            <label for="labelImage">URL da imagem</label>
                            <input type="text" class="form-control" id="inputImage" name="image" autocomplete="off" placeholder="Inserir url da imagem">
                        </div>

                        <div class="form-group">
                            <label for="labelDescription">Descrição</label>
                            <textarea class="form-control" id="textareaDescription" name="description" autocomplete="off" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                  
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection