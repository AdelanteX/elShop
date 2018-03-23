$(document).ready(function() {
 
    $('.delete').click(function(){
         
        var rel = $(this).attr("rel");
         
        $.confirm({
            'title'     : '������������� ��������',
            'message'   : '����� �������� �������������� ����� ����������! ����������?',
            'buttons'   : {
                '��'    : {
                    'class' : 'blue',
                    'action': function(){
                        location.href = rel;
                    }
                },
                '���'   : {
                    'class' : 'gray',
                    'action': function(){}
                }
            }
        });
         
    });
    
     $('#select-links').click(function(){
 $("#list-links,#list-links-sort").slideToggle(200);     
 });   
    
    $('.h3click').click(function(){ 
 $(this).next().slideToggle(400); 
 });
    
    });