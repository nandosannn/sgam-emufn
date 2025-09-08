<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    <p>Hello World</p>
    <div class=" container-fluider mt-5">
        <div class="alert alert-primary back bg-dark text-white">
            Bootstrap está funcionando
        </div>
        <i class="fa-solid fa-house"></i>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" placeholder="Regular" class="form-control" disabled />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-4">
                            <input class="form-control" placeholder="Birthday" type="text">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <input type="text" placeholder="Success" class="form-control is-valid" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                    </div>
                </div>
            </div>
        </form>

        <i class="fa-solid fa-house"></i>
    </div>
</body>

</html>
