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
            min-height: 200px;
            border-radius: 5px;
            border: 2px dotted rgb(146, 12, 255);
            background: white;
            padding: 5px 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .dropzone .dz-message {
            text-align: center;

            margin: 2em 0;
        }
        .dz-message>span{
            font-size: 2rem;
            color:blueviolet;
        }

        element.style {
        }
        .dropzone .dz-preview .dz-image {
            border-radius: 20px;
            overflow: hidden;
            width: 300px;
            height: 300px;
            position: relative;
            display: block;
            z-index: 10;
        }
        .dropzone .dz-preview .dz-image img {
           width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

</head>
<body>

<form action="{{route('uiUploadFile')}}" class="dropzone">
    <DIV class="dz-message">
        <span>Drop For Upload Image</span>
    </DIV>
</form>

{{--script--}}
<script>
    let CSRF_TOKEN = document.querySelector("meta[name='csrf-token']").getAttribute('content');

    Dropzone.autoDiscover = false;
    let myDropzoen = new Dropzone('.dropzone',{
        maxFilesize: 2,//2mb
        acceptFiles:'.jpeg,.jpg,.png'
    });

    myDropzoen.on('sending',function (file,xhr,formData){
        formData.append('_token',CSRF_TOKEN);
    });

    myDropzoen.on('success',function (file,response){
        if(response.success == 0 ){
            //Error
            alert(response.error);
        }else{
            console.log(response);
        }
    });
</script>

</body>
</html>
