<!DOCTYPE html>
<html>
<head>
    <title>Laravel Docs</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Laravel 4 Documentation</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <form method="GET" action="/search" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="string" placeholder="String">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <hr />
                <?php echo $menu; ?>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                <?php echo content(); ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>