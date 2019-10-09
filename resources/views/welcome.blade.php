<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">

                <h2>Enroll</h2>
                <form method="POST" action="/enroll" accept-charset="UTF-8" role="form">
                    {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pob">Place of Birth:</label>
                                <input type="text" class="form-control" id="pob" name="pob">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State:</label>
                                <input type="text" class="form-control" id="state" name="state">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lga">L.G.A:</label>
                                <input type="text" class="form-control" id="lga" name="lga">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nationality">Nationality:</label>
                                <input type="text" class="form-control" id="nationality" name="nationality">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="numeric" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <input type="text" class="form-control" id="occupation" name="occupation">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marital_status">Marital Status:</label>
                                <input type="text" class="form-control" id="marital_status" name="marital_status">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="level">Level:</label>
                                <select name="level">
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advance">Advance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class">Class:</label>
                                <select name="class">
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="B1">B1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="amount" value="2500">
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
                    
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success btn-lg btn-block"
                            value="Enroll Now!">
                            Enroll Now!
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</body>

</html>
