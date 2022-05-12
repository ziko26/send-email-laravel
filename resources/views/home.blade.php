<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Send E-mail with laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center mt-3 pt-3">Send E-mail with laravel</h1>
            @include('layouts.errors')
            @include('layouts.success')
            <form method="post" action="{{route('send')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Your Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                <div class="form-group">
                    <label>Your E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                <div class="form-group">
                    <label>Your Messages <span class="text-danger">*</span></label>
                    <textarea rows="5" name="subject" class="form-control">{{old('subject')}}</textarea>
                    @error('subject')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Send E-mail</button>
                </div>

            </form>
        </div>

    </body>
</html>
