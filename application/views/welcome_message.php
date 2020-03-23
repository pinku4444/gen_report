<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Document Generater</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <style>
            .header {
                min-height: 50px;
                border-bottom: 1px solid #D0D0D0;
                margin-bottom: 10px;
            }
            .export-button {
                padding: 10px;
            }
            .filter-section {
                border-right: 2px solid #D0D0D0;
                min-height:100vh;
            }
            .filter-name {
                min-width: 50%;
            }
            #outline {
                margin: 10px
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-9"></div>
                        <div class="col-sm-3">
                            <div class="export-button">
                                <button type="button" class="btn btn-primary">Run</button>
                                <button type="button" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row"> 
            <div class="col-md-3">
                <div class="filter-section">
                    <ul class="nav nav-tabs">
                        <li class="active filter-name">
                            <a data-toggle="tab" href="#outline">
                                <i class="fa fa-bars" aria-hidden="true"></i> Outline
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#filters">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                Filters
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="outline" class="tab-pane fade in active ">
                            <label for="column-name">
                               column : 
                            </label>
                            <select class="js-example-basic-multiple" id="column-name" name="states[]" multiple="multiple" style="width: 100%">
                                <?php foreach ($column_name as $key => $value): ?>
                                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                <?php endforeach;?>
                                
                            </select>
                        </div>
                        <div id="filters" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9">
            <h1>Hello</h1>
        </div>

    </div>

</body>
</html>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        width: 'resolve'
        
    });
});
</script>
