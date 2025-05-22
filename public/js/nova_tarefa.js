document.querySelector('novatarefa').addEventListener('click',()=>{
    let valor="Select * from tarefa order by tarefa.descricao";
    window.location.href='processar.php?variavel=${encodeURIComponent(valor)}';
})