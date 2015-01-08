$(function(){
    var dataArray=new Array();
    dataArray[0]="assets/photo/me/img1.jpg";
    dataArray[1]="assets/photo/me/img2.jpg";
    dataArray[2]="assets/photo/me/img3.jpg";
    dataArray[4]="assets/photo/me/img4.jpg";
    dataArray[5]="assets/photo/me/img5.jpg";
    dataArray[6]="assets/photo/me/img6.jpg";
    dataArray[7]="assets/photo/me/img7.jpg";
    dataArray[8]="assets/photo/me/img8.jpg";
    dataArray[9]="assets/photo/me/img9.jpg";
    dataArray[10]="assets/photo/me/img10.jpg";

    var narray=10;
    var id1 = Math.floor((Math.random() * narray) + 1);
    var id2 = Math.floor((Math.random() * narray) + 1);
    $('#pic1').attr('src',dataArray[id1]);
    $('#pic2').attr('src',dataArray[id2]);

    window.setInterval(function(){
        $('#pic1').attr('src',dataArray[id1]);
        var nid1 = Math.floor((Math.random() * narray) + 1);
        while (nid1 == id1) {
            nid1 = Math.floor((Math.random() * narray) + 1);
        }
        id1 = nid1;

        $('#pic2').attr('src',dataArray[id2]);
        var nid2 = Math.floor((Math.random() * narray) + 1);
        while (nid2 == id2) {
            nid2 = Math.floor((Math.random() * narray) + 1);
        }
        id2 = nid2;

        $(".imgLiquidFill").imgLiquid({
            fill: true,
            horizontalAlign: "center",
            verticalAlign: "top"
        });
    },2000);        

    $('#imgLiquid1').css({'width':'100px'});
    var cw = $('#imgLiquid1').width();
    $('#imgLiquid1').css({'height':cw+'px'});
    $('#imgLiquid1').css({'width':cw+'px'});
    $('#imgLiquid1').css({'position':'absolute'});
    // var cw2 = $('#imgNonLiquid').position().left;
    $('#imgLiquid1').css({'bottom':'0'});
    $('#imgLiquid1').css({'left':'0'});

    $('#imgLiquid2').css({'width':'100px'});
    var cw3 = $('#imgLiquid2').width();
    $('#imgLiquid2').css({'height':cw3+'px'});
    $('#imgLiquid2').css({'width':cw3+'px'});
    $('#imgLiquid2').css({'position':'absolute'});
    // var cw4 = $('#imgNonLiquid').position().right;
    $('#imgLiquid2').css({'top':'0'});
    $('#imgLiquid2').css({'right':'0'});

});