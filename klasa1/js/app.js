rand = function(min, max) {
    if (min==null && max==null)
        return 0;    

    if (max == null) {
        max = min;
        min = 0;
    }
    return min + Math.floor(Math.random() * (max - min + 1));
};
function generate(low, hi, signs, count){
    let tokens = [];
    for(i = 0; i < count; i++){
        sign = signs[Math.floor(Math.random() * signs.length)]
        num = rand(low, hi);
        tokens.push(num);
        tokens.push(sign);
    }
    tokens.pop();
    solution = eval(tokens.join(" "));
    return {
        "solution": solution,
        "eq": tokens.join(" ")
    }
}

function setEq(num, ans){
    $('.eq').text(num);
    $('.eq').data('answer', ans);
}

function wygenerujNowe(){
    s = {};
    s.min = 1*$('[name=min]').val();
    s.max = 1*$('[name=max]').val();
    s.elements = 1*$('[name=elements]').val();
    s.signs = [];
    if ($("#s_plus").is(":checked")){
        s.signs.push("+");
    }
    if ($("#s_minus").is(":checked")){
        s.signs.push("-");
    }
    while(true){
        nums = generate(s.min, s.max, s.signs, s.elements);
        if (nums.solution >= 0){
            break;
        }
    }
    setEq(nums.eq, nums.solution);
    $("#solution").val("");
    $('.alert').hide();
}
function sprawdzOdpowiedz(){
    let ua = 1*$("#solution").val();
    let ea = 1*$(".eq").data('answer');
    if (ua == ea){
        notify("TAK!", true)
    }else{
        notify("Spróbuj jeszcze raz", false)
    }
}

function notify(msg, succ){
    $('.alert').removeClass('alert-error').show().addClass(succ?"alert-success":"alert-error").text(msg);
}

$(document).ready(() => {
    $(document).on('click', '#generuj', e => {e.preventDefault(); wygenerujNowe()});
    $(document).on('click', '#check', sprawdzOdpowiedz);
    wygenerujNowe();
})

