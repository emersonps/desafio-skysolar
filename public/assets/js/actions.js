function excluir(val) {
   
    let flag = confirm('Deseja excluir esse registro?');
    
    if(flag == true){
        axios.get('/usuario/delete/'+val).then((resp) => {
            window.location.reload();
        });
    }else{
        console.log('não exclui');
    }
};
