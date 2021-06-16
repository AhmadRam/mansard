@extends('admin_panel.adminLayout')
@section('content')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    label.error {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
        padding: 1px 20px 1px 20px;
    }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.products')}}">
                                < {{ __('Back to List')}}</a>
                                    <br>
                                    <br>
                                    <h4 class="card-title">{{ __('Edit product SPA')}}</h4>
                                    <br>
                                    <img id="imageHolder" src="../../../uploads/products/{{$product->id}}/{{$product->image_name}}" alt="add image" height="300" width="300" />
                                    <br>
                                    <input type="file" name="inp_files" id="inp_files" multiple="multiple">
                                    <br>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <input id="inp_img" name="img" type="hidden" value="">
                                        <input type="hidden" name="Category" value="{{$product->category_id}}">
                                        <div class="form-group">
                                            <label>{{ __('Product Image Tag')}}*</label>
                                            <input type="text" class="form-control" id="ImageTag" name="ImageTag" value="{{$product->image_tag}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('SPA Name')}}</label>
                                            <input type="text" class="form-control" id="" name="Name" value="{{$product->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('SPA Name TR')}}</label>
                                            <input type="text" class="form-control" id="" name="NameTR" value="{{$product->name_tr}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{ __('Body scrub Description EN')}}</label>
                                            <textarea type="textarea" class="form-control" name="Bodyscrub" required>{{$product->get_BodyscrubDescription()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{ __('Body scrub Description TR')}}</label>
                                            <textarea type="textarea" class="form-control" name="BodyscrubTR" required>{{$product->get_BodyscrubDescriptionTR()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Quantity')}}</label>
                                            <input type="number" class="form-control" id="" name="Quantitybs" value="{{$product->get_BodyscrubQuantity()->value}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}</label>
                                            <input type="number" class="form-control" name="Pricebs" value="{{$product->get_BodyscrubPrice()->value}}" required>
                                            <input type="radio" name="visiblebs" value="1" {{$product->get_BodyscrubPrice()->visible == 1 ? 'checked' : ''}}>
                                            <label for="visiblebs"> visible</label><br>
                                            <input type="radio" name="visiblebs" value="0" {{$product->get_BodyscrubPrice()->visible == 0 ? 'checked' : ''}}>
                                            <label for="visiblebs">invisible</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body oil Description EN')}}*</label>
                                            <textarea type="textarea" class="form-control" name="Bodyoil" required>{{$product->get_BodyoilDescription()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body oil Description TR')}}*</label>
                                            <textarea type="textarea" class="form-control" name="BodyoilTR" required>{{$product->get_BodyoilDescriptionTR()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Quantity')}}</label>
                                            <input type="number" class="form-control" id="" name="Quantitybo" value="{{$product->get_BodyoilQuantity()->value}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}</label>
                                            <input type="number" class="form-control" name="Pricebo" value="{{$product->get_BodyoilPrice()->value}}" required>
                                            <input type="radio" name="visiblebo" value="1" {{$product->get_BodyoilPrice()->visible == 1 ? 'checked' : ''}}>
                                            <label for="visiblebo"> visible</label><br>
                                            <input type="radio" name="visiblebo" value="0" {{$product->get_BodyoilPrice()->visible == 0 ? 'checked' : ''}}>
                                            <label for="visiblebo">invisible</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body milk Description EN')}}*</label>
                                            <textarea type="textarea" class="form-control" id="" name="Bodymilk" required>{{$product->get_BodymilkDescription()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body milk Description TR')}}*</label>
                                            <textarea type="textarea" class="form-control" id="" name="BodymilkTR" required>{{$product->get_BodymilkDescriptionTR()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Quantity')}}</label>
                                            <input type="number" class="form-control" id="" name="Quantitybm" value="{{$product->get_BodymilkQuantity()->value}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}</label>
                                            <input type="number" class="form-control" name="Pricebm" value="{{$product->get_BodymilkPrice()->value}}" required>
                                            <input type="radio" name="visiblebm" value="1" {{$product->get_BodymilkPrice()->visible == 1 ? 'checked' : ''}}>
                                            <label for="visiblebm"> visible</label><br>
                                            <input type="radio" name="visiblebm" value="0" {{$product->get_BodymilkPrice()->visible == 0 ? 'checked' : ''}}>
                                            <label for="visiblebm">invisible</label><br>
                                        </div>
                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="updateButton" value="{{ __('UPDATE')}}" />
                                    </form>
                                    @if($errors->any())


                                    <ul>
                                        @foreach($errors->all() as $err)
                                        <tr>
                                            <td>
                                                <li>{{$err}}</li>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </ul>
                                    @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function fileChange(e) {

        document.getElementById('inp_img').value = '';

        for (var i = 0; i < e.target.files.length; i++) {

            var file = e.target.files[i];

            if (file.type == "image/jpeg" || file.type == "image/png") {

                var reader = new FileReader();
                reader.onload = function(readerEvent) {

                    var image = new Image();
                    image.onload = function(imageEvent) {

                        var max_size = 600;
                        var w = image.width;
                        var h = image.height;

                        if (w > h) {
                            if (w > max_size) {
                                h *= max_size / w;
                                w = max_size;
                            }
                        } else {
                            if (h > max_size) {
                                w *= max_size / h;
                                h = max_size;
                            }
                        }

                        var canvas = document.createElement('canvas');
                        canvas.width = w;
                        canvas.height = h;
                        canvas.getContext('2d').drawImage(image, 0, 0, w, h);
                        if (file.type == "image/jpeg") {
                            var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                        } else {
                            var dataURL = canvas.toDataURL("image/png");
                        }
                        document.getElementById('inp_img').value += dataURL + '|';
                    }
                    image.src = readerEvent.target.result;
                }
                reader.readAsDataURL(file);

                readURL(this);

            } else {
                document.getElementById('inp_files').value = '';
                alert('Please only select images in JPG or PNG format.');
                return false;
            }
        }

    }

    document.getElementById('inp_files').addEventListener('change', fileChange, false);
</script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageHolder').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        var addedColor = document.querySelector("#color_list").value;
        var arrayOfColor = addedColor.split(',');



        //console.log(addedColor);
        onReadyColorList(arrayOfColor);
    });

    function onReadyColorList(arrayOfColor) {
        var addedColor = document.querySelector("#color_list").value;
        var arrayOfColor = addedColor.split(',');
        for (var i = 0; i < arrayOfColor.length; i++) {
            newColor = `<div style="height:25px;display:inline-block;margin:5px;width:25px!important;background-color:${arrayOfColor[i]}"></div>`;
            document.querySelector("#colors").innerHTML += newColor;
        }
    }

    function addColor() {
        var pickedColor = document.querySelector("#picker").value;
        newColor = `<div style="height:25px;display:inline-block;margin:5px;width:25px!important;background-color:${pickedColor}"></div>`;
        var addedColor = document.querySelector("#color_list").value;
        //console.log(addedColor);
        if (addColor != null) {
            var arrayOfColor = addedColor.split(',');
            if (!arrayOfColor.includes(pickedColor)) {
                arrayOfColor.push(pickedColor);
                document.querySelector("#color_list").value = arrayOfColor.join(',');
                document.querySelector("#colors").innerHTML += newColor;
            }

            console.log(addedColor);


        }
    }
</script>


@endsection