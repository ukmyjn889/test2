/**
 * Created by Liu on 2015/11/19.
 */
function add(){
    alert(1);
}
function showdiv(cid,plannId){
    alert(1);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
    document.getElementById('termv1').value=cid;
    document.getElementById('termv2').value=plannId;
}
function save(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
    alert(document.getElementById("select1").value);
    alert(document.getElementById("select2").value);
}