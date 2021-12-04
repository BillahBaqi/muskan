@extends('layouts.app')
@section('products')
    active
@endsection
@section('product-add')
    active
@endsection
@section('title')
    Products
@endsection

@section('content')
    @include('layouts.nav')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" target="_blank" href="{{ url('/') }}">Muskan</a>
                <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
                <span class="breadcrumb-item active">Add-Products</span>
            </nav>
        </div>
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Muskan Dashboard</h4>
            <p class="mg-b-0">Built on Service, and Focused on Style.</p>
        </div><!-- d-flex -->
        <div class="row pd-x-15">
            <div class="br-pagebody mg-t-1 col-lg-12">
                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Your Products Here</h6>
                    <form action="{{ url('/admin/products/insert') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-6 bd-r bd-info">

                                    <div class="form-group pd-r-15">
                                        <label class="form-control-label">Select Category: <span
                                                class="tx-danger">*</span></label>
                                        <select name="category_id" class="form-control">
                                            <option value=""> Choose one... </option>
                                            @foreach ($categories as $category)
                                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group pd-r-15">
                                        <label class="form-control-label">Select Subcategory: <span
                                                class="tx-danger">*</span></label>
                                        <select name="subcategory_id" class="form-control">
                                            <option value=""> Choose one... </option>
                                            @foreach ($subcategories as $subcategory)
                                                <option {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}
                                                    value="{{ $subcategory->id }}">
                                                    {{ $subcategory->subcategory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group pd-r-15">                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-control-label">Feature Image : <span
                                                        class="tx-danger">*</span></label>
                                                
                                                <input name="product_photo" type="file" id="file" class="form-control" 
                                                        onchange="document.getElementById('image_preview_id').src = window.URL.createObjectURL(this.files[0])">
                                               

                                                <label class="form-control-label pd-t-20">Product Thumbnail: <span
                                                        class="tx-danger">*</span></label>
                                                
                                                <input multiple name="product_thumbnail[]" type="file" id="file2" class="form-control">
                                                
                                            </div>
                                            <div class="col-lg-4 pd-t-30">                                                
                                                <img id="image_preview_id" class="ht-120" alt="">
                                            </div>
                                        </div>
                                        @error('product_photo')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                </div><!-- col-6 -->

                                <div class="col-lg-6">
                                    <div class="form-group pd-l-15">
                                        <label class="form-control-label">Product Name: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name"
                                            placeholder="Enter Product Name" value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group pd-l-15">
                                        <label class="form-control-label">Product Description: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="product_description" rows="5" class="form-control"
                                            placeholder="Type Your Product details...">{{ old('product_description') }}</textarea>
                                        @error('product_description')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group pd-l-15">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <label class="form-control-label">Price (per):
                                                    <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon tx-size-sm lh-2">৳</span>
                                                    <input name="product_price" type="text" class="form-control"
                                                        aria-label="Amount (to the nearest taka)"
                                                        value="{{ old('product_price') }}">
                                                    <span class="input-group-addon tx-size-sm lh-2">.00</span>
                                                </div>
                                                @error('product_price')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">Quantity:
                                                    <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <input name="quantity" type="text" class="form-control"
                                                        value="{{ old('quantity') }}">
                                                    <span class="input-group-addon tx-size-sm lh-2"> Pcs</span>
                                                </div>
                                                @error('quantity')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                </div><!-- col-6 -->

                            </div><!-- row -->

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Add Product</button>
                            </div><!-- form-layout-footer -->
                        </div>
                    </form><!-- form-End -->

                </div>
                <!-- pagebody -->
            </div>
        </div>

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2017. Bracket. All Rights Reserved.</div>
                <div>Attentively and carefully made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/billahbaqi"><i
                        class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/mdbaqibillah"><i
                        class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->

@endsection
@section('footer_js')
    <script>
        $("#checkAll").click(function() {
            $('.check:input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>

    <script>
        $("#checkAll2").click(function() {
            $('.checke:input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>

    <script>
        'use strict';

        ;
        (function(document, window, index) {
            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function(input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName = '';
                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
                            this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        label.querySelector('span').innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });

                // Firefox bug fix
                input.addEventListener('focus', function() {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function() {
                    input.classList.remove('has-focus');
                });
            });
        }(document, window, 0));
    </script>
    {{-- <script>
        //selecting all required elements
        const dropArea = document.querySelector(".drag-area"),
            dragText = dropArea.querySelector("header"),
            button = dropArea.querySelector("button"),
            input = dropArea.querySelector("input");
        let file; //this is a global variable and we'll use it inside multiple functions

        button.onclick = () => {
            input.click(); //if user click on the button then the input also clicked
        }

        input.addEventListener("change", function() {
            //getting user select file and [0] this means if user select multiple files then we'll select only the first one
            file = this.files[0];
            dropArea.classList.add("active");
            showFile(); //calling function
        });


        //If user Drag File Over DropArea
        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault(); //preventing from default behaviour
            dropArea.classList.add("active");
            dragText.textContent = "Release to Upload File";
        });

        //If user leave dragged File from DropArea
        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        });

        //If user drop File on DropArea
        dropArea.addEventListener("drop", (event) => {
            event.preventDefault(); //preventing from default behaviour
            //getting user select file and [0] this means if user select multiple files then we'll select only the first one
            file = event.dataTransfer.files[0];
            showFile(); //calling function
        });

        function showFile() {
            let fileType = file.type; //getting selected file type
            let validExtensions = ["image/jpeg", "image/jpg", "image/png",
                "image/webp"
            ]; //adding some valid image extensions in array
            if (validExtensions.includes(fileType)) { //if user selected file is an image file
                let fileReader = new FileReader(); //creating new FileReader object
                fileReader.onload = () => {
                    let fileURL = fileReader.result; //passing user file source in fileURL variable
                    // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
                    // let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
                    dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
                }
                fileReader.readAsDataURL(file);
            } else {
                alert("This is not an Image File!");
                dropArea.classList.remove("active");
                dragText.textContent = "Drag & Drop to Upload File";
            }
        }
    </script> --}}
@endsection
