<!doctype html>
<html lang="en">
<?php
session_start(); // start the session
$_SESSION['id'] = 'sessionId'; //sample session variable
$session_value = (isset($_SESSION['id']))?$_SESSION['id']:''; // saving the session variable in the php session
$productsArray = $_COOKIE['productsArray'];
if ($productsArray) {
echo($productsArray);
}

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/fontowesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/slick/slick-theme.css"/>


    <title></title>
    <style>

        body {
            background-color: #000000;
        }

        .products {
            background-color: #000000;
        }

        .sliderImageDiv {
            float: left;
            padding: 20px;
        }

        .sliderImageList {
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .productImage {
            cursor: move;
        }

        .shadowImage {
            visibility: hidden;
            height: 50px;
            width: 50px;
            position: absolute;
            opacity: 0.5;
        }

        .sliderImageList, .sliderImageDiv {
            margin-top: 0px;
            margin-bottom: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
            background-color: #616060;
            border-bottom-left-radius: 5px;
                border-top-left-radius: 5px;
                border-bottom-right-radius: 5px;
                border-top-right-radius: 5px;
        }

        #dropContainer {
            margin-top: 0px;
            border: 1px solid #000000;
            height: auto;
        }

        .form-control {
            background-color: #e0dedec2 !important;
        }

        thead {

            color: #ffffff;
        }

        .cart-header {
            margin-top: 20px;
        }

        table, thead {
            width: 100%;
        }

        .btn {
            margin: 2px;
        }

        #myInputautocomplete-list { /*do not remove this this is used inside the library*/
            border: 1px solid #6f6c6c2b;
            position: absolute;
            z-index: 10000;
            background-color: #ffffff;
            width: 92%
        }

        .searchForm {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .searchOption { /*do not remove this this is used inside the library*/
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #8080801f;
            cursor: pointer;
        }

        .slick-prev:before, .slick-next:before{ /*do not remove this this is used inside the library*/
            color: #000000;
        }
        .slick-prev { /*do not remove this this is used inside the library*/
            left: 0px;
        }

        .slick-next { /*do not remove this this is used inside the library*/
            right:  0px;
        }

        .tble-cell {
            word-wrap:break-word;
        }

        .row {
            margin-right: 0px;
            margin-left: 0px;
        }

        .listName {
            color: #ffffff;
        }

        .cartTable {
            overflow-x: auto;
            background-color: #e6e4e4;
            padding: 10px;
        }

        h5, h4 {
            font-weight: 400 !important;
        }

        ::-webkit-input-placeholder { /* Edge */
          color: #ffffff !important;
          text-align: right !important;
          font-size: 18px !important;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
          color: #ffffff !important;
          text-align: right !important;
          font-size: 18px !important;
        }

        ::placeholder {
          color: #ffffff !important;
          text-align: right !important;
          font-size: 18px !important;
        }
</style>
</head>
<body id="body">

<!--auto search start-->
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-sm-4">
        <form autocomplete="off" class="text-right searchForm">
            <div class="autocomplete" style="width:100%;">
                <input id="myInput" class="form-control" type="text" name="searchList" placeholder="Search Teas">
            </div>
        </form>
    </div>
</div>
<!--auto search end-->

<!--sliders list - start-->
<div class="row">
    <div class="col-md-12">
        <div class="card no-margin no-padding products">
            <div class="card-body">
                <div class="row">
<!--                    <div class="col-md-3"></div>-->
                    <div class="col-md-12 productSliders">
<!--                        <div class="col-md-3"></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--sliders list - start-->

<!--droppable div - start-->
<div class="row" id="dropContainer" ondrop="dragEnd(event)" ondragover="allowDrop(event)">
    <div class="col-sm-12 cart-header">
        <h4 class="text-center text-white">Your Blending Table</h4>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10 cartTable">
        <table  width="100%">
            <thead style="width: 100%">
                <th style="width: 5%"></th>
                <th style="width: 25%;padding:5px;"><h4 style="background-color: #5a5a5a;text-align: center;font-weight: 400;">Name</h4></th>
                <th style="width: 20%; padding:5px;"><h4 style="background-color: #5a5a5a;text-align: center;font-weight: 400;">QTY</h4></th>
                <th style="width: 25%"></th>
                <th style="width: 25%; text-align: right;"><h4 style="background-color: #5a5a5a;text-align: center;font-weight: 400;">Price</h4></th>
            </thead>
            <tbody id="cartContent" style="width: 100%">
            <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center"><h4>Total</h4></td>
                <td style="text-align: right">0.00</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-1"></div>
</div>
<!--droppable div - end-->

<div class="row" style="margin-top:50px">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 text-right">
        <button class="btn btn-warning" onclick="clearCart()">Clear Cart</button>&nbsp;
        <button class="btn btn-primary" onclick="finishBlending()">Finish Your Blend</button>
    </div>
    <div class="col-sm-1"></div>
</div>
<!--modal popup - start-->
<div class="modal fade" id="qtyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="number" class="form-control" id="qtyInput" min="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateQty();">Update</button>
            </div>
        </div>
    </div>
</div>
<!--modal popup - end-->

<!--shadow image - start-->
<img class="shadowImage" >
<!--shadow image - end-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="./assets/slick/slick.js"></script>
<script type="text/javascript" src="./assets/autocomplete.js"></script>
</body>
</html>
<script type=text/javascript>
    // defining dummy dataset for the sliders
    var productList = [
        { // list for the 1st slider
            name: 'Teas',
            list: []
        },
        { // list for the 2nd slider
            name: 'Herbs',
            list: []
        },
        { // list for the 3rd slider
            name: 'Flavors',
            list: []
        }
    ];
    var selectedProduct = {}; // to keep the selected temporary data
    var carProductsList = []; // to keep the cart data
    var imageWidth = '100%'; //image width of the each images inside the slider
    var imageHeight = '80px'; //image width of the each images inside the slider

    $(document).ready(()=> {

        loadAjaxData();
        $(window).resize(function(){
            loadHtml(); // load the data each time the page size changes
        });

    });

    function setSession() { // to save the session variables
        var productsArray = '<?php echo $productsArray;?>';
        localStorage.setItem('sessionid', productsArray);

        localStorage.setItem('productsArray', JSON.stringify(carProductsList));
        document.cookie = 'productsArray=' + JSON.stringify(carProductsList);
        window.location.reload();
        getSession();
    }

    function getSession() { // to retrive the saved session data use this function
       var savedSessionId = localStorage.getItem('sessionid');
       var tempProductsArray = localStorage.getItem('productsArray');
    }

    function removeSession() { // to remove the session variable
       localStorage.removeItem('sessionid');
       localStorage.removeItem('productsArray');
    }

    function setAutoSearch() {
        /*An array containing all the data to autosearch:*/

        var searchLsit = [] // autosearch dropdown data

        productList.forEach(function(tempValue, index) { // to get the single list of products to the dropdown
            tempValue.list.forEach(function(item, innerIndex) {
                searchLsit.push(item);

                if ((index == (productList.length - 1)) && (innerIndex == (tempValue.list.length - 1))) { // if the loop in the last index
                    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                    autocomplete(document.getElementById("myInput"), searchLsit);
                }
            });
        });

    }

    function loadAjaxData() {
            $.ajax({
                type: "POST",
                url: "class/tea.php",
                data: {getData:true,cat_id_1:17,cat_id_2:1,cat_id_3:3},
                success: function(data){
                    // console.log(data)
                    var productsResponse = JSON.parse(data); // set data to the list
                    productList[0].list = productsResponse[0];
                    productList[1].list = productsResponse[1];
                    productList[2].list = productsResponse[2];

                    loadHtml(); // load the data in to the html
                    setAutoSearch(); // set the auto search option
                },error: function(error){
                    // error handling
                    // console.log(error);
                }
            });

    }

    function loadHtml() {

        $('.productSliders').empty(); // clear the product list i the slider
        selectedProduct = {}; // clear the selected product
        carProductsList = []; // clear the cart
        drawTableRow();

        productList.forEach(function(tempValue, index) {

            // to create the instants of each slider
            $('.productSliders').append('' +
                '<div class="row">' +
                '<div class="col-sm-12"><h5 class="listName">'+tempValue.name+'</h5></div>' + // slider header
                '<div class="col-sm-12 sliderImageList sliderImageList-'+index+'" ></div>' + // slider images list container
                '</div>');

            tempValue.list.forEach(function(tempProduct, productIndex) { // to create the images to each list
                $('.sliderImageList-'+index).append('<div class="sliderImageDiv text-center sliderImage-'+index+'-'+productIndex+'" id="'+index+'-'+productIndex+'" draggable="true" ></div>'); // div which contain the image
                $('.sliderImage-'+index+'-'+productIndex).append('<img src="./assets/img/'+tempProduct.feature_image+'" draggable="true" class="productImage"  id="image-'+index+'-'+productIndex+'" width="'+imageWidth+'" height="'+imageHeight+'" draggable="true" ' + // image with related events
                    'ondragstart="dragStart(event)" ondrag="drag(event)" ondragend="dragEnd(event)" ontouchstart="touchStart(event)" ontouchend="touchEnd(event)" ontouchmove="touchMove(event)" ontouchleave="touchLeave(event)" ontouchcancel="touchCancel(event)"/>');
                $('#image-'+index+'-'+productIndex).data(tempProduct); // setting data to image which we can use as the selected value in each events

                if (tempValue.list.length == (productIndex + 1)) { // if the loop is the last one
                    loadSlickSlider('.sliderImageList-'+index); // load the slider
                    // $('.dropContainer').height();
                }
            });
        });

        var productsArray = '<?php echo $productsArray;?>';
        if (productsArray) {
            carProductsList = JSON.parse(productsArray);
            drawTableRow();
        }
    }

    function loadSlickSlider(divClass) { // the slick slider initialization for more info : https://kenwheeler.github.io/slick/
        $(divClass).slick({
            dots: false,
            infinite: false,
            centerMode: false,
            speed: 2000,
            slidesToShow: 12,
            slidesToScroll: 1,
            arrows: false,
            responsive: [ // to set the responsiveness
                {
                    breakpoint: 1024, // window size
                    settings: {
                        slidesToShow: 5, // number of images in the view at a time
                        slidesToScroll: 1, // number of images to to move at a time
                        arrows: true, // side arrows
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        arrows: true,
                    }
                }
            ]
        });

        $(function() {
            $('*[draggable!=true]','.slick-track').unbind('dragstart'); // to add drag and drop to slick slider
            // $( ".productImage" ).draggable();
        });

        // $(".productImage").on("draggable mouseenter mousedown",function(event){
        //     event.stopPropagation();
        // });
    }


    // keep these functionalities for drag and drop events
    function allowDrop(ev) { // drop effect
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function dragStart(event) {

    }

    function dragEnd(event) {
        var dropperCntnrX = $('#dropContainer').position().left // dropper container position x
        var dropperCntnrY = $('#dropContainer').position().top // dropper container position y
        var dropperCntnrWdt = $('#dropContainer').width() // dropper container position width
        var dropperCntnrHgt = $('#dropContainer').height() // dropper container position height

        if ((event.pageX > dropperCntnrX) && (event.pageX < (dropperCntnrX + dropperCntnrWdt)) && (event.pageY > dropperCntnrY) && (event.pageY < (dropperCntnrY + dropperCntnrHgt))){

            var tempID = event.target.id;
            if(selectedProduct && productList[tempID.split('-')[1]]) {
                selectedProduct = productList[tempID.split('-')[1]].list[tempID.split('-')[2]];

                if (selectedProduct.product_id > 0) {
                    setTimeout(function(){
                        $('#qtyModal').modal('show');
                        if (selectedProduct.is_loose != 'T') {
                            $('#qtyInput').attr('step', 1);
                        } else {
                            $('#qtyInput').attr('step', 0.1);
                        }
                    },10)
                }

            }
        }
    }

    function drag(event) {

    }

    function touchStart(event) { //for touch device
        createShadowImage(event); // create shadow image to move with the mouse pointer
    }

    function touchEnd(event) { //for touch device
        removeShadowImage(event);

        var dropperCntnrX = $('#dropContainer').position().left // dropper container position x
        var dropperCntnrY = $('#dropContainer').position().top // dropper container position y
        var dropperCntnrWdt = $('#dropContainer').width() // dropper container position width
        var dropperCntnrHgt = $('#dropContainer').height() // dropper container position height

        // check whether the user placed the mouse pointer inside the droppable box
        if ((event.changedTouches[0].pageX > dropperCntnrX) && (event.changedTouches[0].pageX < (dropperCntnrX + dropperCntnrWdt)) && (event.changedTouches[0].pageY > dropperCntnrY) && (event.changedTouches[0].pageY < (dropperCntnrY + dropperCntnrHgt))){
            $('#qtyModal').modal('show'); // show the popup to type qty

            // to set the selected item
            var tempID = event.target.id;
            if(selectedProduct && productList[tempID.split('-')[1]]) {
                selectedProduct = productList[tempID.split('-')[1]].list[tempID.split('-')[2]];

                if (selectedProduct.product_id > 0) {
                    setTimeout(function(){
                        $('#qtyModal').modal('show');
                        if (selectedProduct.is_loose != 'T') {
                            $('#qtyInput').attr('step', 1);
                        } else {
                            $('#qtyInput').attr('step', 0.1);
                        }
                    },10)

                }
            }
        }
    }

    function touchMove(event) {
        // positioning the shadow image with the mouse in each pointer move
        $('.shadowImage').css({left: (event.targetTouches[0].pageX - ($('.shadowImage').width() / 2)), top: (event.targetTouches[0].pageY - ($('.shadowImage').height() / 2))});
    }

    function touchLeave(event) {

    }

    function touchCancel(event) {

    }

    function drop(ev) {

    }

    function createShadowImage(event) {
        $('.shadowImage').attr('src', $('#'+event.target.id).attr('src'));
        $('.shadowImage').css({left: (event.targetTouches[0].pageX - ($('.shadowImage').width() / 2)), top: (event.targetTouches[0].pageY - ($('.shadowImage').height() / 2))});
        $('.shadowImage').css('visibility', 'visible');
    }

    function removeShadowImage(event) {
        $('.shadowImage').attr('src', '');
        $('.shadowImage').css('visibility', 'hidden');
        $('.shadowImage').css({left: 0, top: 0});
    }

    function updateQty() { // to update the qty of the selected item
    const tempcartProductsList = JSON.parse(JSON.stringify(carProductsList));

        if (selectedProduct && (selectedProduct.product_id)) {
            selectedProduct.qty = Number($('#qtyInput').val());  // update qty
            if (selectedProduct.is_loose != 'T') {
                selectedProduct.qty = Math.round(selectedProduct.qty);
            }

            const indexof = tempcartProductsList.findIndex(function(tempData) {
                if (tempData.product_id == selectedProduct.product_id) {
                    return true;
                }
            });

            if (indexof > -1) {
                carProductsList[indexof].qty = tempcartProductsList[indexof].qty + selectedProduct.qty;
            } else {
                carProductsList.push(selectedProduct); // add to cart
            }

            selectedProduct = {};
            $('#qtyInput').val(null);
            $('#myInput').val(null);
            drawTableRow();
            $('#qtyModal').modal('hide');
        }
    }

    function drawTableRow() { // to draw the each items in the cart rows inside the table
        $('#cartContent').empty(); // remove existing rows
        var total = 0; // to get the total of amount
        carProductsList.forEach(function(tempproduct, index) { // loop through each cart product and draw the row

            var loose = '';
            if (tempproduct.is_loose == 'T') {
                var loose = 'g';
            } else {
                var loose = '';
            }
            $('#cartContent').append('<tr>' +
                '<td class="tble-cell"><button class="btn btn-sm btn-danger" onclick="removeItem('+index+')"><i class="fa fa-trash"></i></button></td>' +
                '<td class="tble-cell" style="text-align: center">'+tempproduct.product_name+'</td>' +
                '<td class="tble-cell" style="text-align: center">'+tempproduct.qty+' '+loose+'</td>' +
                '<td class="tble-cell" style="text-align: left"><img src="./assets/img/'+tempproduct.feature_image+'" width="50px" height="50px"></td>' +
                '<td class="tble-cell" style="text-align: right">'+(Number(tempproduct.price) * Number(tempproduct.qty)).toFixed(2)+'</td>' +
                '</tr>');

            total = total + (Number(tempproduct.price) * Number(tempproduct.qty)) // calculate the sum
        });

        // to add the row of summation into the table
        $('#cartContent').append('<tr><td class="tble-cell"></td><td class="tble-cell"></td><td class="tble-cell">&nbsp;</td><td class="tble-cell"></td><td class="tble-cell"></td></tr>' +
            '<tr><td class="tble-cell"></td><td class="tble-cell"></td><td class="tble-cell">&nbsp;</td><td class="tble-cell"></td><td class="tble-cell"></td></tr>' +
            '<tr>' +
            '<td class="tble-cell"></td>' +
            '<td class="tble-cell"></td>' +
            '<td class="tble-cell"></td>' +
            '<td class="tble-cell" style="text-align: center"><h4>Total</h4></td>' +
            '<td class="tble-cell" style="text-align: right">'+total.toFixed(2)+'</td>' +
            '</tr>');
    }

    function removeItem(index) { // to remove the added cart items
        carProductsList.splice(index, 1);
        drawTableRow();
    }

    function finishBlending() {
        setSession();
    }

    function clearCart() {
        carProductsList = [];
        setSession();
        drawTableRow();
    }

</script>
