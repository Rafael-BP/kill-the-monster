$("#sugestoes").change(function()
{
    switch($(this).val()) {
    case "-1":
        alteraCampos("", "", "", "");
        break;
    case "1":
        alteraCampos("Blue Hat", "monsters/blue_hat.png", "monsters/winner.png", "200");
        break;
    case "2":
        alteraCampos("Dragon", "monsters/dragon.png", "monsters/winner.png", "300");
        break;
    case "3":
        alteraCampos("Radioactive Jelly", "monsters/radioactive_jelly.png", "monsters/winner.png", "400");
        break;
    case "4":
        alteraCampos("Yellow Thing","monsters/yellow_thing.png" , "monsters/winner.png", "500");
        break;
    
}
});

function alteraCampos(nome, imagem, recompensa, vida)
{
    $("#nome").val(nome);
    $("#imagem").val(imagem);
    $("#recompensa").val(recompensa);
    $("#vida").val(vida);

}