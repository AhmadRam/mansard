@extends('admin_panel.adminLayout') @section('content')
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
                            <a style="color:green;" href="{{route('admin.products')}}">
                                < {{ __('Back to List')}}</a>
                                    <br>
                                    <br>
                                    <h4>{{ __('Create product')}}</h4>
                                    <br>
                                    <img id="imageHolder" src="https://static.thenounproject.com/png/187803-200.png" alt="add image" height="150" width="150" />
                                    <br>
                                    <input type="file" name="inp_files" id="inp_files" multiple="multiple">
                                    <br>
                                    <div id="empty_image"> </div>
                                    <form class="forms-sample" method="post" id="product_form">
                                        {{csrf_field()}}
                                        <input id="inp_img" name="img" type="hidden" value="">

                                        <br><br>
                                        <div class="form-group">
                                            <label>{{ __('Product Image Tag')}}*</label>
                                            <input type="text" class="form-control" id="ImageTag" name="ImageTag" value="" required>
                                        </div>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label>{{ __('Product Name EN')}}*</label>
                                            <input type="text" class="form-control" id="Name" name="Name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Name TR')}}*</label>
                                            <input type="text" class="form-control" id="Name" name="NameTR" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Description EN')}}*</label>
                                            <input type="hidden" name="Descriptions" value="Description">
                                            <textarea type="textarea" class="form-control" id="Description" name="Description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Description TR')}}*</label>
                                            <input type="hidden" name="DescriptionsTR" value="Description TR">
                                            <textarea type="textarea" class="form-control" id="Description" name="DescriptionTR" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Properties EN')}}*</label>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="inputFormRow">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="properties[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>
                                                            <div class="input-group-append">
                                                            <button id="removeRow" type="button" class="btn btn-danger" onClick="remove_row()">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="newRow"></div>
                                                </div>
                                            </div>
                                            <label for="Description">{{ __('Product Properties TR')}}*</label>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="inputFormRowTR">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="propertiesTR[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>
                                                            <div class="input-group-append">
                                                            <button id="removeRowTR" type="button" class="btn btn-danger" onClick="remove_row()">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="newRowTR"></div>
                                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                </div>
                                            </div>

                                        </div>

                                        <script type="text/javascript">
                                            // add row
                                            $("#addRow").click(function() {
                                                var html = '';
                                                html += '<div id="inputFormRow">';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="properties[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="removeRow" type="button" class="btn btn-danger"  onClick="remove_row()">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';

                                                $('#newRow').append(html);

                                                var html = '';
                                                html += '<div id="inputFormRowTR">';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="propertiesTR[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" required>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="removeRowTR" type="button" class="btn btn-danger"  onClick="remove_row()">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';

                                                $('#newRowTR').append(html);
                                            });

                                            // remove row
                                            function remove_row() {
                                                $('#removeRow').closest('#inputFormRow').remove();
                                                $('#removeRowTR').closest('#inputFormRowTR').remove();
                                            }
                                        </script>

                                        <div class="form-group">
                                            <label for="Description">{{ __('Product How To Use EN')}}*</label>
                                            <input type="hidden" id="Name" name="howuse" value="How To Use">
                                            <textarea type="textarea" class="form-control" id="how_use" name="how_use" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product How To Use TR')}}*</label>
                                            <input type="hidden" id="Name" name="howuseTR" value="How To Use TR">
                                            <textarea type="textarea" class="form-control" id="how_use" name="how_useTR" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Active Ingredients EN')}}*</label>
                                            <input type="hidden" id="Name" name="activeingredients" value="Active Ingredients">
                                            <textarea type="textarea" class="form-control" id="active_ingredients" name="active_ingredients" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Active Ingredients TR')}}*</label>
                                            <input type="hidden" id="Name" name="activeingredientsTR" value="Active Ingredients TR">
                                            <textarea type="textarea" class="form-control" id="active_ingredients" name="active_ingredientsTR" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Product Formulated Without')}}*</label>
                                            <input type="hidden" id="Name" name="formulatedwithout" value="Formulated Without">
                                            <textarea type="textarea" class="form-control" id="formulated_without" name="formulated_without" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Category">{{ __('Category')}}*</label>
                                            <select class="form-control form-control-md" id="options" name="Category">
                                                @php foreach($catlist->all() as $cat) {
                                                echo "<option value=".$cat->id.">".$cat->name." </option>"; $select_attribute=''; } @endphp
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}*</label>
                                            <input type="hidden" id="Name" name="Prices" value="Price">
                                            <input type="number" class="form-control" name="Price" id="Price" value="" required>
                                            <input type="radio" name="visible" value="1" checked>
                                            <label for="visible1"> visible</label><br>
                                            <input type="radio" name="visible" value="0">
                                            <label for="visible2">invisible</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Quantity')}}*</label>
                                            <input type="hidden" id="Name" name="Quantitys" value="Quantity">
                                            <input type="number" class="form-control" name="Quantity" id="Quantity" value="" required>
                                        </div>

                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton" value="{{ __('Create')}}" />
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
</script>


<!--JQUERY Validation-->
<script>
    $(document).ready(function() {



        $("#product_form").validate({

            rules: {

                Name: "required",
                inp_files: "required",

                Description: "required",
                Category: "required",
                Price: {
                    required: true,
                    number: true
                },

            },
            messages: {

                Name: "No Name is Entered",
                inp_files: "ERRRERRR",
                Description: "No Description is Entered",
                Category: "No Category is Selected",

                Price: {
                    required: "No Price is Entered",
                    number: "Invalid Price"
                },
            }

        });

    });
</script>
<!--/JQUERY Validation-->
@endsection