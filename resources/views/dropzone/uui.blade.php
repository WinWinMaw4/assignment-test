<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css"  rel="stylesheet">

    <script  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <style>
        .dropzone {
            height: auto;
            width: 100%;
            border-radius: 5px;
            border: 2px dotted rgb(2, 126, 203);
            background: white;
            padding: 5px 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
        }
        .dropzone .dz-message {
            text-align: center;

            margin: 2em 0;
        }
        .dz-message>span{
            font-size: 1.5rem;
            color: rgb(2, 126, 203);
        }
        .dropzone .dz-preview .dz-image {
            border-radius: 20px;
            overflow: hidden;
            width: 150px;
            height: 150px;
            position: relative;
            display: block;
            z-index: 10;
        }
        .dropzone .dz-preview .dz-image img {
           width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>

</head>
<body>

<form action="{{route('uiUploadFile')}} " class="dropzone">
    <DIV class="dz-message"   >
        <span>Drag/Drop Product Image Here</span>
    </DIV>
</form>

{{--<img src="" class="previewImage" alt="">--}}
{{--<input type="text" value="" id="image" name="" class="imageInput form-control @error('photo') is-invalid @enderror visually-hidden" >--}}
{{--@error('photo')--}}
{{--<div class="invalid-feedback text-danger">--}}
{{--    <span class="text-danger">{{$message}}</span>--}}
{{--</div>--}}
{{--@enderror--}}


{{----}}

<div class="mb-4">
    @php use Illuminate\Support\Facades\Route;$route = Route::current()->getName(); @endphp
{{--    {{$route}}--}}
    <h6 class="previewHeader mt-3" style="display: none"  >Product Image Preview</h6>
    <img src="" id="coverPreview" class="cover-img w-50 rounded @error('photo') border border-danger is-invalid @enderror" value="{{ old('photo') }}" alt="">
    @if($route =='products.create')
        <input type="file" id="cover" class="d-none" name="photo" accept="image/jpeg,image/png"  form="productCreateForm">
{{--        form Create--}}
    @elseif($route == 'products.edit')
        <input type="file" id="cover" class=" d-none" name="photo" accept="image/jpeg,image/png"  form="productEditForm">
{{--        Form Edit--}}
    @else

    @endif
    @error('photo')
    <div class="invalid-feedback">
        <span>{{$message}}</span>
    </div>
    @enderror
</div>


{{----}}
{{--script--}}
<script>
    let CSRF_TOKEN = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    //
    Dropzone.autoDiscover = false;
    let myDropzoen = new Dropzone('.dropzone',{
        maxFilesize: 2,//2mb
        acceptFiles:'.jpeg,.jpg,.png'
    });

    myDropzoen.on('sending',function (file,xhr,formData){
        formData.append('_token',CSRF_TOKEN);
        // let imageInput = document.querySelector('.imageInput');
        // imageInput.value = file.name;
        // console.log(`File added : ${file.name}`);

        let previewHeader = document.getElementsByClassName('previewHeader')[0];
        let coverPreview = document.getElementById('coverPreview');
        let cover = document.getElementById('cover');

        // let file = cover.files[0];
        let reader = new FileReader();
        reader.onload = function (){
            coverPreview.src = reader.result;
            previewHeader.style.display = 'block'
        }
        reader.readAsDataURL(file);

    });

    myDropzoen.on('success',function (file){
        let previewHeader = document.getElementsByClassName('previewHeader')[0];
        let coverPreview = document.getElementById('coverPreview');
        let cover = document.getElementById('cover');
        let productEditForm = document.getElementById('productEditForm');


        // let file = file;



        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        cover.files = dataTransfer.files;
        console.log(cover);
    })


    // myDropzoen.on('success',function (file,response){
    //     if(response.success == 0 ){
    //         //Error
    //         alert(response.error);
    //     }else{
    //         let fileName = response.fileName;
    //         let imageInput = document.querySelector('.imageInput');
    //         imageInput.value = fileName;
    //         console.log(imageInput);
    //     }
    // });
</script>

</body>
</html>
