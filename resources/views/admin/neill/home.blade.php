@extends('adminlte::page')

@section('title', 'Neill')
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
        <form method="POST" action="{{url('/panel/cNeill')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content borda-arredondada">
                    <div class="modal-header">
                        <p><b><h4> {!! trans('site.item') !!}!</h4></b></p>
                    </div>
                    <div class="modal-body modal-adm-itens">
                        <div class="form-group">
                                                <label for="img-item">

                                                    <div class="fileUpload btn btn-dark">
                                                        <span>Upload</span>
                                                        <input id="imgItem" name="img_item" type="file"
                                                               class="form-control-file border"/>
                                                    </div>
                                                </label>

                                                <label for="item_name">{{trans('site.name')}}:
                                                    <input name="item_name" type="text"
                                                           class="form-control form-expandido borda-arredondada item-name"
                                                           id="item_name"
                                                           value="">
                                                </label>
                                                <label for="item_desc">{{trans('site.desc')}}:
                                                    <textarea name="item_desc"
                                                              class="form-control form-expandido area-text borda-arredondada"
                                                              id="item_desc"
                                                              rows="3" cols="60">

                                                    </textarea>
                                                </label>
                                                <div class="well well-lg well-status">
                                                    <label for="item__id">{{trans('site.item')}}:
                                                        <input name="item__id" type="text"
                                                               class="form-control label-mini borda-arredondada item__id"
                                                               id="item__id"
                                                               value="">
                                                    </label>
                                                    <label for="item_cont">{{trans('site.stock')}}:
                                                        <input name="item_cont" type="text"
                                                               class="form-control label-mini borda-arredondada item_cont"
                                                               id="estoque"
                                                               value="1">
                                                    </label>
                                                    <label for="item_price">{{trans('site.cash')}}:
                                                        <input name="item_price" type="text"
                                                               class="form-control label-mini borda-arredondada item_price"
                                                               id="item_price"
                                                               value="1">
                                                    </label>

                                                </div>
                                                <div class="well well-lg well-status">
                                                    <label for="ef1">{{trans('site.ef')}}1:
                                                        <input name="ef1" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef1"
                                                               value="0">
                                                    </label>
                                                    <label for="efv1">{{trans('site.efv')}}1:
                                                        <input name="efv1" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv1"
                                                               value="0">
                                                    </label>
                                                    <label for="ef2">{{trans('site.ef')}}2:
                                                        <input name="ef2" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef2"
                                                               value="0">
                                                    </label>
                                                    <label for="efv2">{{trans('site.efv')}}2:
                                                        <input name="efv2" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv2"
                                                               value="0">
                                                    </label>
                                                    <label for="ef3">{{trans('site.ef')}}3:
                                                        <input name="ef3" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef3"
                                                               value="0">
                                                    </label>
                                                    <label for="efv3">{{trans('site.efv')}}3:
                                                        <input name="efv3" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv3"
                                                               value="0">
                                                    </label>

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
                    <h3 class="box-title">{{strtoupper(trans('site.item'))}}</h3>
                    <button id="id-new-noticia" type="submit" data-toggle="modal"
                            data-target="#modal-criar-item"
                            class="btn btn-success btn-new-item">{!! trans('site.create') !!}</button>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-noticia-sao">
                    <table id="lista-itens"

                           class="table table-bordered table-responsive table-hover table-panel-noticias">

                        <thead>
                        <tr class="titulo">
                            <th>Img:</th>
                            <th>ID:</th>
                            <th>{{strtoupper(trans('site.name'))}}:</th>
                            <th>{{strtoupper(trans('site.desc'))}}:</th>
                            <th>{{strtoupper(trans('site.stock'))}}:</th>
                            <th>{{strtoupper(trans('site.cash'))}}:</th>
                            <th>{{strtoupper(trans('site.id_item'))}}:</th>

                            {{--ação--}}
                            <th>{{strtoupper(trans('site.action'))}}:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($itens as $item)
                            <div class=" modal fade" id="modal-adm-item-{{$item->id}}" data-backdrop="static">
                                <form method="POST" id="form-edit-item" action="{{url('/panel/eNeill')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content borda-arredondada">
                                        <div class="modal-header">
                                            <p><b><h4> {!! trans('site.item') !!}!</h4></b></p>
                                        </div>
                                        <div class="modal-body modal-adm-itens">
                                            <div class="form-group">
                                                <label for="img-item">

                                                    <div class="fileUpload btn btn-dark">
                                                        <span>Upload</span>
                                                        <input id="imgItem-{{$item->id}}" name="img_item" type="file"
                                                               class="form-control-file border"/>
                                                    </div>
                                                </label>
                                                <div class="well well-lg well-status">
                                                <label for="id_item" class="item-id-label">ID:
                                                    <input name="id_item" readonly type="text"
                                                           id="id-item-{{$item->id}}"
                                                           class="form-control form-expandido borda-arredondada item-id"
                                                           value="{{$item->id}}">
                                                </label>
                                                <label for="item_name">{{trans('site.name')}}:
                                                    <input name="item_name" type="text"
                                                           class="form-control form-expandido borda-arredondada item-name"
                                                           id="item_name-{{$item->id}}"
                                                           value="{{$item->item_name}}">
                                                </label>
                                                </div>
                                                <label for="item_desc">{{trans('site.desc')}}:
                                                    <textarea name="item_desc"
                                                              class="form-control form-expandido area-text borda-arredondada"
                                                              id="item_desc-{{$item->id}}"
                                                              rows="3" cols="60">
{{$item->item_desc}}
                                                    </textarea>
                                                </label>
                                                <div class="well well-lg well-status">
                                                    <label for="item__id">{{trans('site.item')}}:
                                                        <input name="item__id" type="text"
                                                               class="form-control label-mini borda-arredondada item__id"
                                                               id="item__id-{{$item->id}}"
                                                               value="{{$item->item__id}}">
                                                    </label>
                                                    <label for="item_cont">{{trans('site.stock')}}:
                                                        <input name="item_cont" type="text"
                                                               class="form-control label-mini borda-arredondada item_cont"
                                                               id="estoque-{{$item->id}}"
                                                               value="{{$item->item_cont}}">
                                                    </label>
                                                    <label for="item_price">{{trans('site.cash')}}:
                                                        <input name="item_price" type="text"
                                                               class="form-control label-mini borda-arredondada item_price"
                                                               id="item_price-{{$item->id}}"
                                                               value="{{$item->item_price}}">
                                                    </label>

                                                </div>
                                                <div class="well well-lg well-status">
                                                    <label for="ef1">{{trans('site.ef')}}1:
                                                        <input name="ef1" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef1-{{$item->id}}"
                                                               value="{{$item->item__ef1}}">
                                                    </label>
                                                    <label for="efv1">{{trans('site.efv')}}1:
                                                        <input name="efv1" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv1-{{$item->id}}"
                                                               value="{{$item->item__efv1}}">
                                                    </label>
                                                    <label for="ef2">{{trans('site.ef')}}2:
                                                        <input name="ef2" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef2-{{$item->id}}"
                                                               value="{{$item->item__ef2}}">
                                                    </label>
                                                    <label for="efv2">{{trans('site.efv')}}2:
                                                        <input name="efv2" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv2-{{$item->id}}"
                                                               value="{{$item->item__efv2}}">
                                                    </label>
                                                    <label for="ef3">{{trans('site.ef')}}3:
                                                        <input name="ef3" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="ef3-{{$item->id}}"
                                                               value="{{$item->item__ef3}}">
                                                    </label>
                                                    <label for="efv3">{{trans('site.efv')}}3:
                                                        <input name="efv3" type="text"
                                                               class="form-control label-mini borda-arredondada"
                                                               id="efv3-{{$item->id}}"
                                                               value="{{$item->item__efv3}}">
                                                    </label>

                                                </div>

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
                                <td class="icon-item"><img src="{{asset('cash/img/itens/'.$item->item__id.'.gif')}}"></td>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_desc }}</td>
                                <td>{{ $item->item_cont }}</td>
                                <td>{{$item->item_price}}</td>
                                <td>{{ $item->item__id }}</td>

                                {{--Ação--}}
                                <td>
                                    <button type="submit"
                                            class="btn btn-warning glyphicon glyphicon-pencil edit-adm-item"
                                            title="{{trans('site.edit')}} {{trans('site.item')}}"
                                            data-toggle="modal"
                                            data-target="#modal-adm-item-{{$item->id}}">
                                        <p>{{trans('site.edit')}}</p></button>
                                    <form method="POST" id="form-edit-item" action="{{url('/panel/dNeill')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input name="id_item" readonly type="hidden"
                                                           id="del-item-{{$item->id}}"
                                                           class="form-control form-expandido borda-arredondada item-id"
                                                           value="{{$item->id}}">
                                            <button id="iddel-{{$item->id}}" type="submit"
                                            class="btn btn-danger glyphicon glyphicon-remove excluir-adm-item"
                                            title="{{trans('site.delete')}} {{trans('site.item')}}">
                                            <p>{{trans('site.delete')}}</p></button>
                                    </form>
                                </td>

                            </tr>

                        @empty
                            <td> {!! trans('site.none_f') !!} {!! trans('site.item') !!} {!! trans('site.found_f') !!}
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
