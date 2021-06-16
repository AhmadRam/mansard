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
                                    <h4 class="card-title">{{ __('Edit product')}}</h4>
                                    <br>
                                    <img id="imageHolder" src="../../../uploads/products/{{$product->id}}/{{$product->image_name}}" alt="add image" height="300" width="300" />
                                    <br>
                                    <input type="file" name="inp_files" id="inp_files" multiple="multiple">
                                    <br>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <input id="inp_img" name="img" type="hidden" value="">
                                        <div class="form-group">
                                            <label>{{ __('Product Image Tag')}}*</label>
                                            <input type="text" class="form-control" id="ImageTag" name="ImageTag" value="{{$product->image_tag}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Name EN')}}</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="{{$product->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Name TR')}}</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="NameTR" value="{{$product->name_tr}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{ __('Product Description EN')}}</label>
                                            <textarea type="textarea" class="form-control" name="Description" required>{{$product->get_description()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{ __('Product Description TR')}}</label>
                                            <textarea type="textarea" class="form-control" name="DescriptionTR" required>{{$product->get_descriptionTR()->value}}</textarea>
                                        </div>

                                        <div class="form-group">


                                        </div>
                                        <div class="form-group">

                                            <label for="Description">{{ __('Product Properties EN')}}*</label>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @foreach($product->propertie() as $pro)
                                                    <div id="inputFormRow">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="properties[{{$pro->id}}][]" class="form-control m-input" value="{{$pro->title}}" autocomplete="off" required>
                                                            <div class="input-group-append">
                                                                <button id="removeRow{{$pro->id}}" type="button" class="btn btn-danger" onClick="remove_row({{$pro->id}})">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div id="newRow"></div>

                                                </div>
                                            </div>


                                            <label for="Description">{{ __('Product Properties TR')}}*</label>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @foreach($product->propertie() as $pro)
                                                    <div id="inputFormRowTR">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="propertiesTR[{{$pro->id}}][]" class="form-control m-input" value="{{$pro->title_tr}}" autocomplete="off" required>
                                                            <div class="input-group-append">
                                                                <button id="removeRowTR{{$pro->id}}" type="button" class="btn btn-danger" onClick="remove_row({{$pro->id}})">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div id="newRowTR"></div>
                                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                </div>
                                            </div>
                                        </div>


                                        <script type="text/javascript">
                                            // add row
                                            $("#addRow").click(function() {
                                                var int = parseInt((Math.random() * 100), 10)

                                                var html = '';
                                                html += '<div id="inputFormRow">';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="properties[][]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="removeRow' + int + '" type="button" class="btn btn-danger"  onClick="remove_row(' + int + ')">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';

                                                $('#newRow').append(html);

                                                var html = '';
                                                html += '<div id="inputFormRowTR">';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="propertiesTR[][]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="removeRowTR' + int + '" type="button" class="btn btn-danger"  onClick="remove_row(' + int + ')">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';

                                                $('#newRowTR').append(html);
                                            });

                                            // remove row
                                            function remove_row(id) {
                                                $('#removeRow' + id).closest('#inputFormRow').remove();
                                                $('#removeRowTR' + id).closest('#inputFormRowTR').remove(); 
                                            }
                                        </script>


                                        <div class="form-group">
                                            <label for="Description">{{ __('Product How To Use EN')}}*</label>
                                            <textarea type="textarea" class="form-control" id="how_use" name="how_use" required>{{$product->get_how_use()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product How To Use TR')}}*</label>
                                            <textarea type="textarea" class="form-control" id="how_use" name="how_useTR" required>{{$product->get_how_useTR()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Active Ingredients EN')}}*</label>
                                            <textarea type="textarea" class="form-control" id="active_ingredients" name="active_ingredients" required>{{$product->get_active_ingredients()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Active Ingredients TR')}}*</label>
                                            <textarea type="textarea" class="form-control" id="active_ingredients" name="active_ingredientsTR" required>{{$product->get_active_ingredientsTR()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Formulated Without')}}*</label>
                                            <textarea type="textarea" class="form-control" id="formulated_without" name="formulated_without" required>{{$product->get_formulated_without()->value}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">{{ __('Large select')}}</label>
                                            <select class="form-control form-control-md" id="exampleFormControlSelect1" name="Category">
                                                @php foreach($catlist->all() as $cat) { if($product->category->id==$cat->id) { $select_attribute='selected'; } echo "
                                                <option value=".$cat->id." " .$select_attribute.">".$cat->name." </option>"; $select_attribute=''; } @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}</label>
                                            <input type="number" class="form-control" name="Price" value="{{$product->get_Price()->value}}" required>
                                            <input type="radio" name="visible" value="1" {{$product->get_Price()->visible == 1 ? 'checked' : ''}}>
                                            <label for="visible1"> visible</label><br>
                                            <input type="radio" name="visible" value="0" {{$product->get_Price()->visible == 0 ? 'checked' : ''}}>
                                            <label for="visible2">invisible</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Quantity')}}</label>
                                            <input type="number" class="form-control" name="Quantity" value="{{$product->get_quantity()->value}}" required>
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