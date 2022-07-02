<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css">
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body <?php body_class(); ?>>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>John's Blog</h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="/">Home</a></li>
                <?php create_bootstrap_menu('primary') ?>
            </ul><br>
            <div class="input-group">
                <form action="/" method="get">
                <input type="text" class="form-control" name="s" value="<?= get_search_query(); ?>" placeholder="Search Blog..">
                <input type="hidden" value="post"  name="post_type" id="post_type">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
                </form>
            </div>
        </div>
        <div class="col-sm-9">
