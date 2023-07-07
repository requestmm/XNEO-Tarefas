$(document).ready(function() {
    
    class Task{

        static list(data){
            $.ajax({  
                type: "GET",
                url: "/api/tarefas",
                data,
                success: function(data){
                    return data;
                }
              });
        }

        static update(data){
            console.log(data)
            $.ajax({  
                type: "PATCH",
                url: "/api/tarefas",
                data,
                success: function(data){
                    location.reload();
                }
              });
        }

        static create(data){
            console.log(data);
            $.ajax({  
                type: "POST",
                url: "/api/tarefas",
                data,
                success: function(data){
                    location.reload();
                }
              });
        }

    }


    $('#formulario-criar-tarefa').on("submit", function(event){
        
        event.preventDefault();
        const answer = $('#formulario-criar-tarefa').serialize();

        const result = Task.create(answer);


    });
    

    $('.salvar-tarefa').on("submit", function(event){
        
        event.preventDefault();
        const id = $(this).data("id");
        const data = $(`[data-id=${id}]`).serialize();
        //console.log(data)
        Task.update(data);


    });



});