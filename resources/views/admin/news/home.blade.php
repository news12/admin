@extends('adminlte::page')

@section('title', 'News')
@section('content_header')
    <p></b></p>
    @if (session('success'))

        <div id="alerta-time" class="alert alert-success p-2">
            {!! session('success') !!}
        </div>
    @endif
    @if (session('error'))

        <div id="alerta-time" class="alert alert-danger p-2">
            {!! session('error') !!}
        </div>
    @endif
@stop

@section('content')
    <div class=" modal fade" id="modal-criar-item" data-backdrop="static">
        <form method="POST" action="{{url('/panel/cNews')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content borda-arredondada">
                    <div class="modal-header">
                        <p><b><h4> {!! trans('site.news') !!}!</h4></b></p>
                    </div>
                    <div class="modal-body modal-adm-itens">
                        <div class="form-group">

                                                <label for="titulo">{{trans('site.news')}}:
                                                    <input name="titulo" type="text"
                                                           class="form-control form-expandido borda-arredondada item-name"
                                                           id="titulo"
                                                           value="">
                                                </label>
                                                <label for="corpo">{{trans('site.desc')}}:
                                                    <textarea name="corpo"
                                                              class="form-control form-expandido area-text borda-arredondada"
                                                              id="corpo"
                                                              rows="3" cols="60">

                                                    </textarea>
                                                </label>
                                                <div class="well well-lg well-status">
                                                    <label for="tipo">{{trans('site.type')}}:
                                                        <input name="tipo" type="text"
                                                               class="form-control label-mini borda-arredondada news-type"
                                                               id="tipo"
                                                               value="">
                                                    </label>

                                                </div>
                                                <div class="well well-lg well-status">
                                                    <label for="autor">{{trans('site.autor')}}:
                                                        <input name="autor" readonly type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="autor"
                                                               value="{{$autor}}">
                                                    </label>
                                                    <label for="data">{{trans('site.date')}}:
                                                        <input name="data" type="datetime-local"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="data"
                                                               value="">

                                                </div>

                                            </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-default pull-left btn-cancel-item"
                                data-dismiss="modal">{!! trans('site.cancel') !!}</button>
                        <button id="idsubmit-new-item" type="submit"
                                class="btn btn-primary btn-create-item">{!! trans('site.create') !!}</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>

    <div class="d-flex flex-row justify-content-sm-center flex-wrap row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{strtoupper(trans('site.news'))}}</h3>
                    <button id="id-new-noticia" type="submit" data-toggle="modal"
                            data-target="#modal-criar-item"
                            class="btn btn-success btn-new-item">{!! trans('site.create') !!}</button>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-noticia-sao">
                    <table id="lista-noticias"

                           class="table table-bordered table-responsive table-hover table-panel-noticias">

                        <thead>
                        <tr class="titulo">
                            <th>ID:</th>
                            <th>{{strtoupper(trans('site.title'))}}:</th>
                            <th>{{strtoupper(trans('site.desc'))}}:</th>
                            <th>{{strtoupper(trans('site.type'))}}:</th>
                            <th>{{strtoupper(trans('site.autor'))}}:</th>
                            <th>{{strtoupper(trans('site.date'))}}:</th>

                            {{--ação--}}
                            <th>{{strtoupper(trans('site.action'))}}:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($itens as $item)
                            <div class=" modal fade" id="modal-adm-item-{{$item->id}}" data-backdrop="static">
                                <form method="POST" id="form-edit-item" action="{{url('/panel/eNews')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content borda-arredondada">
                                        <div class="modal-header">
                                            <p><b><h4> {!! trans('site.item') !!}!</h4></b></p>
                                        </div>
                                        <div class="modal-body modal-adm-itens">
                                            <div class="form-group">

                                                <div class="well well-lg well-status">
                                                <label for="id_item" class="item-id-label">ID:
                                                    <input name="id_item" readonly type="text"
                                                           id="id-item-{{$item->id}}"
                                                           class="form-control form-expandido borda-arredondada item-id"
                                                           value="{{$item->id}}">
                                                </label>
                                                <label for="titulo">{{trans('site.title')}}:
                                                    <input name="titulo" type="text"
                                                           class="form-control form-expandido borda-arredondada item-name"
                                                           id="titulo-{{$item->id}}"
                                                           value="{{$item->titulo}}">
                                                </label>
                                                </div>
                                                <label for="corpo">{{trans('site.desc')}}:
                                                    <textarea name="corpo"
                                                              class="form-control form-expandido area-text borda-arredondada"
                                                              id="corpo-{{$item->id}}"
                                                              rows="3" cols="60">
{{$item->corpo}}
                                                    </textarea>
                                                </label>
                                                <div class="well well-lg well-status">
                                                    <label for="tipo">{{trans('site.type')}}:
                                                        <input name="tipo" type="text"
                                                               class="form-control label-mini borda-arredondada item__id"
                                                               id="tipo-{{$item->id}}"
                                                               value="{{$item->tipo}}">
                                                    </label>
                                                    <label for="autor">{{trans('site.autor')}}:
                                                        <input name="autor" readonly type="text"
                                                               class="form-control label-mini borda-arredondada item_cont"
                                                               id="autor-{{$item->id}}"
                                                               value="{{$item->autor}}">
                                                    </label>

                                                </div>
                                                <label for="data">{{trans('site.date')}}:
                                                    <input name="data" type="datetime-local"
                                                           class="form-control label-mini borda-arredondada"
                                                           id="data-{{$item->id}}"
                                                           value="{{$item->data}}">
                                                </label>

                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-default pull-left btn-cancel-item"
                                                    data-dismiss="modal">{!! trans('site.cancel') !!}</button>
                                            <button id="idsubmit-{{$item->id}}" type="submit"
                                                    class="btn btn-primary btn-save-item">{!! trans('site.save') !!}</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                </form>
                            </div>


                            <tr class="text">
                                <td>{{$item->id}}</td>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->corpo }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>{{$item->autor}}</td>
                                <td>{{ $item->data }}</td>

                                {{--Ação--}}
                                <td>
                                    <button type="submit"
                                            class="btn btn-warning glyphicon glyphicon-pencil edit-adm-item"
                                            title="{{trans('site.edit')}} {{trans('site.item')}}"
                                            data-toggle="modal"
                                            data-target="#modal-adm-item-{{$item->id}}">
                                        <p>{{trans('site.edit')}}</p></button>
                                    <form method="POST" id="form-edit-item" action="{{url('/panel/dNews')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input name="id_item" readonly type="hidden"
                                                           id="del-item-{{$item->id}}"
                                                           class="form-control form-expandido borda-arredondada item-id"
                                                           value="{{$item->id}}">
                                            <button id="iddel-{{$item->id}}" type="submit"
                                            class="btn btn-danger glyphicon glyphicon-remove excluir-adm-item"
                                            title="{{trans('site.delete')}} {{trans('site.news')}}">
                                            <p>{{trans('site.delete')}}</p></button>
                                    </form>
                                </td>

                            </tr>

                        @empty
                            <td> {!! trans('site.none_f') !!} {!! trans('site.news') !!} {!! trans('site.found_f') !!}
                                ...
                            </td>
                        @endforelse

                        </tbody>

                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@stop
