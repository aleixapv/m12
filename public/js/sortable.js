$( document ).ready(function(){
    const dragArea = $('.divSortable');
    new Sortable(dragArea[0],{
        animation: 350
    });
});