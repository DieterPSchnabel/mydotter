/*my_plugins/custom/custom.js only for backend*/



/*   *********************************** my functions ********************************** */
/*   ............. ajax .................. */
/*   ............. any table .................. */
/*   ............. Diverses .................. */
/*   ............. Text .................. */


function alert_swal(headertxt,text,type) {
    swal(headertxt, text, type);
}


function alert_swal_html(text,headertxt) {
  if (headertxt===undefined) {headertxt = 'Oops...';}
    swal({
    title: headertxt,
    html:  text
  });
}



function confirm_swal(headertxt,text,confirm_text,type) {
   // e.preventDefault();
  swal({
    title: headertxt,
    text: text,
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: confirm_text,
    closeOnConfirm: false
  },
  function(){
      //this.form.submit();
    //swal("Deleted!", "File has been deleted.", "success");
      //swal("Deleted!", "File has been deleted.");
     // swal("Deleted!");
  });
}

function delete_in_table(table,id,ident) {
    swal({
        title: "ID: #"+id+" wirklich löschen?",
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
        /*swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )*/
        ax_jq('/axfe','id=107_'+table+'_xyx_'+id,ident+'_conf');
    }
})
}

/*   ............. ajax .................. */

function ax_jq(url,param,target) {
    if($('#'+target).length>0) {
        $('#'+target).html('<i style="color:#4DBD74;margin-left:6px" class="fa fa-repeat fa-spin" aria-hidden="true"></i>');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//alert(url);
    $.ajax({
        type:'POST',
        url: url,
        data:{id:param},
        //dataType: 'html'  /*weglassen dann werden scripts evaluiert siehe 147  */  ,
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
            alert(xhr.responseText);
            alert('Fehler line 92...')
        },
        success: function(data) {
          if( $("#"+target) )  $("#"+target).html(data.msg); //oder json(data)
        }
    });
}


    function __ax_jq(url,param,target) {
        //sample: ax_jq('/axfe','id=###_'+ident+'_xyx_'+table+'_xyx_'+id,ident+'_conf');
        alert(param);
        alert(target);
        //url = 'https://boiler1.mydotter.de/axfe';
        //url = '/frontend/frontend/axfe';
        //alert(url);

        if($('#'+target).length>0) {
            $('#'+target).html('<i class="fa fa-refresh fa-spin dimmed03" aria-hidden="true"></i>');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: url,
            data:{id:param},
            //dataType: 'html'  /*weglassen dann werden scripts evaluiert siehe 147  */  ,
            error: function() { alert('Fehler line 75...') },
            success: function(data) {
                $("#"+target).html(data.msg); //oder json(data)
            }
        });


    }

// if exists mit len !!


function reload_ax(){
    if($('#mydotter_overlay')) $('#mydotter_overlay').show();
    window.location.reload();
}

function parent_reload_ax(){
    if($('#mydotter_overlay')) $('#mydotter_overlay').show();
    parent.location.reload();
}

/*function grayOut(vis, options) {
//alert(vis);
  var options = options || {};
  var zindex = options.zindex || 2050;
  var opacity = options.opacity || 50;
  var opaque = (opacity / 100);
  var bgcolor = options.bgcolor || '#000000';
  var dark=document.getElementById('darkenScreenObject');
  if (!dark) {
    var tbody = document.getElementsByTagName("body")[0];
    var tnode = document.createElement('div');
        tnode.style.position='absolute';
        tnode.style.top='0px';
        tnode.style.left='0px';
        tnode.style.overflow='hidden';
        tnode.style.display='none';
        tnode.id='darkenScreenObject';
    tbody.appendChild(tnode);
    dark=document.getElementById('darkenScreenObject');
  }
  if (vis) {

    var ch = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight;
    var cw = document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.clientWidth;
    var sh = document.documentElement.scrollHeight ? document.documentElement.scrollHeight : document.body.scrollHeight;
    if(document.body.scrollHeight) sh = Math.max(sh,document.body.scrollHeight)
    var sw = document.documentElement.scrollWidth ? document.documentElement.scrollWidth : document.body.scrollWidth;
    if(document.body.scrollWidth) sh = Math.max(sh,document.body.scrollWidth)
    var wh = window.innerHeight ? window.innerHeight : document.body.offsetHeight;

    dark.style.opacity=opaque;
    dark.style.MozOpacity=opaque;
    dark.style.filter='alpha(opacity='+opacity+')';
    dark.style.zIndex=zindex;
    dark.style.backgroundColor=bgcolor;
    dark.style.height = Math.max(wh,Math.max(sh,ch))+'px';
    dark.style.width  = Math.max(sw,cw)+'px';
    dark.style.display='block';
  } else {
    //alert('aus');
     dark.style.display='none';
  }
}*/



/*   ............. any table .................. */

function set_div(value, what, ident) {
    ax_jq('/axfe','id=108_'+value+'_xyx_'+what, 'conf_'+ident);
}

function checkbox_to_any_table(checked, ident ,table, field, id_field, id, page_reload){
    //alert(page_reload);
    if (checked){
      val = "1";
      ax_jq('/axfe','id=102_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+page_reload,ident+'_conf');

      //if($('#wrp_'+ident)) $('#wrp_'+ident).css('background-color', '#eef7ea');
      if($('#wrp_'+id+'_'+ident)) $('#wrp_'+id+'_'+ident).css('background-color', '#eef7ea');
      if($('#vw_'+id)) $('#vw_'+id).slideDown(1000);
      //if($('#vw_'+id)) show($('#vw_'+id));
    }else{
      val = "0";
      ax_jq('/axfe','id=102_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+page_reload,ident+'_conf');

      //if($('#wrp_'+ident)) $('#wrp_'+ident).css('background-color', '#f6f6f6');
        if($('#wrp_'+id+'_'+ident)) $('#wrp_'+id+'_'+ident).css('background-color', '#f6f6f6');

        if($('#vw_'+id)) $('#vw_'+id).slideUp(1000);
        //if($('#vw_'+id)) hide($('#vw_'+id));
    }
}


function save_color(color, ident, id){
    //alert(id);
    table='diverses';
    field = 'div_res';
    id_field = 'div_what';
    with_page_reload = '0';

    ax_jq('/axfe','id=103_'+color+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+with_page_reload,ident+'_conf');
}

function customCleaner(txt) {
    //return txt.replace("'", "&#39;");
    return txt.replace(/'/g, "&#39;");

}
function text_to_any_table(ident ,table, field, id, id_field, with_page_reload){
//alert(field);
    val = $('#'+ident).val(); //read val from input with given id
    val = customCleaner(val); // remove ' replace with &#39;

    if(val==''){
        swal({
            title: 'Kein Text!',
            text: 'Das Feld ist leer - trotzdem speichern?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ja, speichern!',
            cancelButtonText: 'Abbruch'
        }).then((result) => {
            if (result.value) {
                ax_jq('/axfe','id=103_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+with_page_reload,ident+'_conf');
        }
        })
    }else{
        ax_jq('/axfe','id=103_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+with_page_reload,ident+'_conf');
    }
      //$('#wrp_'+ident).css('background-color', '#eef7ea');
}



function date_to_any_table(ident ,table, field, id, id_field, date_to_sql){

    val = $('#'+ident).val();

    //alert(val);

    if(val=='' || val=='0000-00-00 00:00:00' ){
        swal("Kein Datum!", "Das Feld ist leer - nichts gespeichert!", "warning")
    } else {
        ax_jq('/axfe','id=104_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+date_to_sql,ident+'_conf');
        //$('#wrp_'+ident).css('background-color', '#eef7ea');
    }
}


/*
short text inline
short text all langs
long text
long text all langs

get_select_by_t_key(

date picker
color picker
radio

*/


/*   ............. Diverses .................. */



/*   ............. Text .................. */

// Call: strReplaceAll2 = strText.replaceAll( "th", "[X]" )
String.prototype.replaceAll = function(
  strTarget, // The substring you want to replace
  strSubString // The string you want to replace in.
  ){
    var strText = this;
    var intIndexOfMatch = strText.indexOf( strTarget );
    while (intIndexOfMatch != -1){
    strText = strText.replace( strTarget, strSubString )
    intIndexOfMatch = strText.indexOf( strTarget );
  }
  return( strText );
}

function strtolower(str) {
  return (str + '')
    .toLowerCase();
}

function strtoupper(str) {
  return (str + '')
    .toUpperCase();
}

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

function selectAll(theField) {
tempval=$('#'+theField);
tempval.focus();
tempval.select();
}


/*function ltrim (value) {
  var re = /\s*((\S+\s*)*)/;
  return value.replace(re, "$1");
}*/
//function rtrim (value) {
//  var re = /((\s*\S+)*)\s*/;
//  return value.replace(re, "$1");
//}
/*function trim (value) {
  return ltrim(rtrim(value));
}
*/

// trim
String.prototype.trim = function() {
   return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
   return this.replace(/^\s+/g,"");
}
String.prototype.rtrim = function() {
   return this.replace(/\s+$/g,"");
}

function Right(str, n){
    if (n <= 0){
       return "";
    }else{
  if (n > String(str).length)
       {return str;
    }else {
       var iLen = String(str).length;
       return String(str).substring(iLen, iLen - n);
     }
    }
}


/*   ............. viewport .................. */

function getHeight() {
  return getviewportHeight();
}
function getWidth() {
  return getviewportWidth();
}

function getviewportWidth() {
  if (typeof window.innerWidth != 'undefined')
   {
        viewportwidth = window.innerWidth,
        viewportheight = window.innerHeight
   }

  // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

   else if (typeof document.documentElement != 'undefined'
       && typeof document.documentElement.clientWidth !=
       'undefined' && document.documentElement.clientWidth != 0)
   {
         viewportwidth = document.documentElement.clientWidth,
         viewportheight = document.documentElement.clientHeight
   }

   // older versions of IE
   else
   {
         viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
         viewportheight = document.getElementsByTagName('body')[0].clientHeight
   }
  return viewportwidth;
}

function getviewportHeight() {
  if (typeof window.innerWidth != 'undefined')
   {
        viewportwidth = window.innerWidth,
        viewportheight = window.innerHeight
   }

  // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

   else if (typeof document.documentElement != 'undefined'
       && typeof document.documentElement.clientWidth !=
       'undefined' && document.documentElement.clientWidth != 0)
   {
         viewportwidth = document.documentElement.clientWidth,
         viewportheight = document.documentElement.clientHeight
   }

   // older versions of IE

   else
   {
         viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
         viewportheight = document.getElementsByTagName('body')[0].clientHeight
   }
  return viewportheight;
}


/*   ............. Radio .................. */



/*   ............. Math .................. */

function doRound(x, pl) {
/*
zahl = zahl.toFixed(places);
Number.toPrecision(x)
*/
var zahl = Math.round(x*Math.pow(10,pl))/Math.pow(10,pl);
return zahl.toFixed(2);

}

/*   ............. visibility .................. */



function hide(elem, meth){
    if(meth===undefined) meth = 'slide';
    if(meth=='slide'){
        $('#'+elem).slideUp();
    }else{
        $('#'+elem).fadeOut();
    }
}

function show(elem, meth){
    if(meth===undefined) meth = 'slide';
    if(meth=='slide'){
        $('#'+elem).slideDown();
    }else{
        $('#'+elem).fadeIn();
    }
}

function toggle(elem, meth){

    if(meth===undefined) meth = 'slide';
    if(meth=='slide'){
        $('#'+elem).slideToggle();
    }else{
        $('#'+elem).fadeToggle();
    }
}

function scroll_to(id,offset) {
    //alert(offset)
    if(offset===undefined) {offset=-55}
    if( $(id) ) {
        $('html, body').animate({
            scrollTop: $("#"+id+"").offset().top + offset
        }, 1500);
    }
}


/*function scroll_to(id){
  alert(id);
  if( $('a_'+id) )  {
    Effect.ScrollTo('a_'+id, { duration: 3.5, offset: -86 })
  }
  if( $(id) ) {
    Effect.ScrollTo(id, { duration: 3.5, offset: -86 })
  }
}*/
/*
function scroll_to2(id,offs){
if(offs===undefined) {offs=-20}
Effect.ScrollTo(id, { duration: 1.5, offset: offs })
}

*/

/*   ............. HTTP .................. */

function curPageName(){
var sPath = window.location.pathname;
return sPath.substring(sPath.lastIndexOf('/') + 1);
}

// = route path
function curPath(){
var sPath = window.location.pathname;
return sPath;
}

function my_url(){
return location.protocol+'//'+location.host+'/'+'/';
}

//nur in Kombination mit currPath()!
function set_cookie_disp_per_page(anz){
      if (cookiesAllowed()){
        setCookie('disp_per_page',anz,30);
        window.location.reload();
      }
}

function cookiesAllowed() {
   setCookie('checkCookie', 'test', 1);
   if (getCookie('checkCookie')) {
      deleteCookie('checkCookie');
      return true;
   }
   return false;
}

function setCookie(name,value,expires, options) {
   if (options===undefined) { options = {}; }
   if ( expires ) {
      var expires_date = new Date();
      expires_date.setDate(expires_date.getDate() + expires)
   }
   document.cookie = name+'='+escape( value ) +
      ( ( expires ) ? ';expires='+expires_date.toGMTString() : '' ) +
      ( ( options.path ) ? ';path=' + options.path : '' ) +
      ( ( options.domain ) ? ';domain=' + options.domain : '' ) +
      ( ( options.secure ) ? ';secure' : '' );
}

function getCookie( name ) {
   var start = document.cookie.indexOf( name + "=" );
   var len = start + name.length + 1;
   if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) ) {
      return null;
   }
   if ( start == -1 ) return null;
   var end = document.cookie.indexOf( ';', len );
   if ( end == -1 ) end = document.cookie.length;
   return unescape( document.cookie.substring( len, end ) );
}

function deleteCookie( name, path, domain ) {
   if ( getCookie( name ) ) document.cookie = name + '=' +
      ( ( path ) ? ';path=' + path : '') +
      ( ( domain ) ? ';domain=' + domain : '' ) +
      ';expires=Thu, 01-Jan-1970 00:00:01 GMT';
}

function fancybox_close(){
//alert('close');
    //$.fancybox.close();
    parent.jQuery.fancybox.close();
}

function replicate_div_what_key(what){
    old_name = $('#old_name2_'+what).val();
    new_name = $('#new_name2_'+what).val();

    if(old_name != new_name && new_name.length != 0) {
        ax_jq('/axfe', 'id=112_' + old_name + '_xyx_' + new_name, what + '_conf2');
    }else{
        alert('Fehler bei '+ old_name+' - '+ new_name);
    }
}

function update_div_what_key(what) {
    old_name = $('#old_name_'+what).val();
    new_name = $('#new_name_'+what).val();

    if(old_name != new_name && new_name.length != 0) {
        ax_jq('/axfe', 'id=109_' + old_name + '_xyx_' + new_name, what + '_conf');
    }else{
        alert('Fehler bei new_name');
    }
  //ax_jq('/axfe','id=104_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id+'_xyx_'+date_to_sql,ident+'_conf');

}
function check_search_val() {
    if ($('#mysearch').val().length == 0) {
        return false;
    }else{
        return true;
    }
}
//fullscreen  https://codepen.io/matt-west/pen/hmqsF
var requestFullscreen = function (ele) {
    if (ele.requestFullscreen) {
        ele.requestFullscreen();
    } else if (ele.webkitRequestFullscreen) {
        ele.webkitRequestFullscreen();
    } else if (ele.mozRequestFullScreen) {
        ele.mozRequestFullScreen();
    } else if (ele.msRequestFullscreen) {
        ele.msRequestFullscreen();
    } else {
        console.log('Fullscreen API is not supported.');
    }
    setCookie('fullscreen','on');
};

var exitFullscreen = function () {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    } else {
        console.log('Fullscreen API is not supported.');
    }
    //set cookie fullscreen=on
    deleteCookie('fullscreen');
};

if(document.getElementById('fs-doc-button') && document.getElementById('fs-exit-doc-button')) {
    var fsDocButton = document.getElementById('fs-doc-button');
    var fsExitDocButton = document.getElementById('fs-exit-doc-button');

    fsDocButton.addEventListener('click', function (e) {
        e.preventDefault();
        requestFullscreen(document.documentElement);
        //$('#fs-doc-button').hide();
        document.getElementById('fs-doc-button').style.display = 'none';
        document.getElementById('fs-exit-doc-button').style.display = 'inline';
    });

    fsExitDocButton.addEventListener('click', function (e) {
        e.preventDefault();
        exitFullscreen();
        document.getElementById('fs-exit-doc-button').style.display = 'none';
        document.getElementById('fs-doc-button').style.display = 'inline';
    });
}
//end fullscreen

function change_sort_order(val,id){
    var quant=$('#'+id).val();
    var newval = parseInt(quant)+val;
    $('#'+id).val(newval) ;
}
function change_sort_order_and_save(val,id,table,table_id_field,table_id,table_col,with_page_reload){
    var quant=$('#'+id).val();
    var newval = parseInt(quant)+val;
    $('#'+id).val(newval) ;
    var ident = table+'_'+table_id+'_'+table_col;
    //alert(ident);
    ax_jq('/axfe','id=103_'+newval+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+table_col+'_xyx_'+table_id_field+'_xyx_'+table_id+'_xyx_'+with_page_reload,ident+'_conf');
}

$( "#tab_cols" ).on( "submit", function( event ) {
    event.preventDefault();
    cols= $( this ).serialize();
    //console.log( $( this ).serialize() );
    cols_arr = cols.split("&");
    //console.log( cols_arr );
    var str, str2
    var colstring = ''
    var table_name = ''

    for (var i = 0, len = cols_arr.length; i < len; i++) {
        str = cols_arr[i]
        str2 = str.replace('=on', '')
        //console.log(cols_arr[i]);
        //console.log(str2);
        if (str2.indexOf("table_name=") == -1) {
            //colstring = colstring + '"'+str2+'"' + ','
            colstring = colstring + str2 + ','
        } else {
            table_name = str2.replace('table_name=', '')
        }
    }
    //console.log(colstring);
    //console.log(table_name);
    var t_key = table_name+'_disp_cols_arr'
    //console.log(t_key);
    var ident = table_name+'_get_cols'
    ax_jq('/axfe','id=110_'+table_name+'_xyx_'+t_key+'_xyx_'+colstring, ident+'_conf');
});

function display_all_cols(table_name){
    ax_jq('/axfe','id=111_'+table_name, table_name+'_display_all_conf'); //languages_display_all_conf
}
function hide_all_cols(table_name){
    ax_jq('/axfe','id=114_'+table_name, table_name+'_display_all_conf'); //languages_display_all_conf
}

//https://github.com/daneden/animate.css
$.fn.extend({
    animateCss: function (animationName, callback) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            if (callback) {
                callback();
            }
        });
        return this;
    }
});


//function toggle_animation(id, old_anim, new_anim){
function toggle_animation(id){
    //alert(new_anim);
    //obj = $('#'+id);

    //obj.toggleClass('zoomIn zoomOut');
    //obj.toggleClass('old_anim new_anim');
    $('#'+id).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', doSomething(id));
    //$('#'+id).animateCss(old_anim, function () {
        //alert(old_anim);
        // Do somthing after animation
    //$('#'+id).removeClass('animated ' + old_anim);
    //$('#'+id).addClass('animated ' + new_anim);
    //});
}
function doSomething(id){
    //alert(id);
    $('#'+id).toggleClass('zoomIn zoomOut');
}

function flush_cache(ident){
    //alert(ident);
    ax_jq('/axfe','id=113_'+ident, ident+'_conf');
}


function create_index(table_name,field) {
    swal({
        title: 'Are you sure?',
        text: "Create Index '"+field+"' for '"+ table_name +"'?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, create it!',
        cancelButtonText: 'No, don\'t create it'
    }).then((result) => {
        if (result.value) {
        ax_jq('/axfe','id=116_'+table_name+'_xyx_'+field,'create_'+field+'_conf');
        // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
    } else if (result.dismiss === 'cancel') {
        swal(
            'Cancelled',
            'The index was not created!',
            'error'
        )
    }
})
}
function recreate_index(table_name,field) {
    swal({
        title: 'Are you sure?',
        text: "Recreate Index '"+field+"' for '"+ table_name +"'?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, recreate it!',
        cancelButtonText: 'No, don\'t recreate it'
    }).then((result) => {
        if (result.value) {
        ax_jq('/axfe','id=117_'+table_name+'_xyx_'+field,'recreate_'+field+'_conf');
    } else if (result.dismiss === 'cancel') {
        swal(
            'Cancelled',
            'The index was not recreated, but it is still there!',
            'error'
        )
    }
})
}
function drop_index(table_name,field) {
    swal({
        title: 'Are you sure?',
        text: "Drop Index '"+field+"' for '"+ table_name +"'?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
    if (result.value) {

        /*swal(
            'Deleted!',
            "Index '" + field + "' for '" + table_name + "' was dropped.",
            'success'
        )*/
        ax_jq('/axfe','id=115_'+table_name+'_xyx_'+field,'drop_'+field+'_conf');
        // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
    } else if (result.dismiss === 'cancel') {
        swal(
            'Cancelled',
            'The index file is still save!',
            'error'
        )
    }
})

}

function exec_exec_box(header,axfe,page_reload_indic,ident) {
    swal({
        title: header,
        text: "Execute now? - Read desription carefully!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, go on!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
        ax_jq('/axfe','id='+axfe+'_'+ page_reload_indic,'exec_'+ident+'_'+axfe+'_conf');
    } else if (result.dismiss === 'cancel') {
        swal(
            'Cancelled',
            'Nothing was executed!',
            'error'
        )
    }
})
}
function display_table_stru(table_name) {
    ax_jq('/axfe','id=118_'+table_name,'disp_table_stru');
}

function show_only_activated_langs(table){

    ax_jq('/axfe','id=121_'+table,'show_only_activated_langs_conf');
}

function save_on_enter(ident,event){
    if (event.which == 13) {
        event.preventDefault();
        document.getElementById(ident+'_save').click();
    }
}
