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
                        <div class="card-body" id="SPA">
                            <a style="color:green;" href="{{route('admin.products')}}">
                                < {{ __('Back to List')}}</a>
                                    <br>
                                    <br>
                                    <h4>{{ __('Create product SPA')}}</h4>
                                    <br>
                                    <img id="imageHolder" src="https://static.thenounproject.com/png/187803-200.png" alt="add image" height="150" width="150" />
                                    <br>
                                    <input type="file" name="inp_files" id="inp_files" multiple="multiple" required>
                                    <br>
                                    <div id="empty_image"> </div>
                                    <form class="forms-sample" method="post" id="product_form" action="{{route('admin.products.post')}}">
                                        {{csrf_field()}}
                                        <input id="inp_img" name="img" type="hidden" value="">

                                        <br><br>
                                        <div class="form-group">
                                            <label>{{ __('SPA Image Tag')}}*</label>
                                            <input type="text" class="form-control" id="ImageTag" name="ImageTag" value="" required>
                                        </div>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label>{{ __('SPA Name')}}*</label>
                                            <input type="text" class="form-control" id="Name" name="Name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('SPA Name TR')}}*</label>
                                            <input type="text" class="form-control" id="Name" name="NameTR" value="" required>
                                        </div>
                                        <input type="hidden" name="Category" value="9">

                                        <div class="form-group">
                                            <label for="Description">{{ __('Body scrub Description EN')}}*</label>
                                            <input type="hidden" name="BodyscrubDescription" value="Body scrub Description">
                                            <textarea type="textarea" class="form-control" id="Description" name="Bodyscrub" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body scrub Description TR')}}*</label>
                                            <input type="hidden" name="BodyscrubDescriptionTR" value="Body scrub Description TR">
                                            <textarea type="textarea" class="form-control" id="Description" name="BodyscrubTR" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __(' Quantity')}}*</label>
                                            <input type="hidden" name="BodyscrubQuantity" value="Body scrub Quantity">
                                            <input type="number" class="form-control" name="Quantitybs" id="Quantity" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}*</label>
                                            <input type="hidden" name="BodyscrubPrise" value="Body scrub Price">
                                            <input type="number" class="form-control" name="Pricebs" id="Pricebm" value="" required>
                                            <input type="radio" name="visiblebs" value="1" checked>
                                            <label for="visible1"> visible</label><br>
                                            <input type="radio" name="visiblebs" value="0">
                                            <label for="visible2">invisible</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body oil Description EN')}}*</label>
                                            <input type="hidden" name="BodyoilDescription" value="Body oil Description">
                                            <textarea type="textarea" class="form-control" id="Description" name="Bodyoil" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body oil Description TR')}}*</label>
                                            <input type="hidden" name="BodyoilDescriptionTR" value="Body oil Description TR">
                                            <textarea type="textarea" class="form-control" id="Description" name="BodyoilTR" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __(' Quantity')}}*</label>
                                            <input type="hidden" name="BodyoilQuantity" value="Body oil Quantity">
                                            <input type="number" class="form-control" name="Quantitybo" id="Quantity" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}*</label>
                                            <input type="hidden" name="BodyoilPrise" value="Body oil Price">
                                            <input type="number" class="form-control" name="Pricebo" id="Pricebm" value="" required>
                                            <input type="radio" name="visiblebo" value="1" checked>
                                            <label for="visible1"> visible</label><br>
                                            <input type="radio" name="visiblebo" value="0">
                                            <label for="visible2">invisible</label><br>
                                        </div>

                                        <div class="form-group">
                                            <label for="Description">{{ __('Body milk Description EN')}}*</label>
                                            <input type="hidden" name="BodymilkDescription" value="Body milk Description">
                                            <textarea type="textarea" class="form-control" id="Description" name="Bodymilk" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">{{ __('Body milk Description TR')}}*</label>
                                            <input type="hidden" name="BodymilkDescriptionTR" value="Body milk Description TR">
                                            <textarea type="textarea" class="form-control" id="Description" name="BodymilkTR" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __(' Quantity')}}*</label>
                                            <input type="hidden" name="BodymilkQuantity" value="Body milk Quantity">
                                            <input type="number" class="form-control" name="Quantitybm" id="Quantity" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Product Price')}}*</label>
                                            <input type="hidden" name="BodymilkPrise" value="Body milk Price">
                                            <input type="number" class="form-control" name="Pricebm" id="Pricebm" value="" required>
                                            <input type="radio" name="visiblebm" value="1" checked>
                                            <label for="visible1"> visible</label><br>
                                            <input type="radio" name="visiblebm" value="0">
                                            <label for="visible2">invisible</label><br>
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