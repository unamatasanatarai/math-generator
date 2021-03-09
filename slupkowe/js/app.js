rand = function(min, max) {
    if (min==null && max==null)
        return 0;

    if (max == null) {
        max = min;
        min = 0;
    }
    return min + Math.floor(Math.random() * (max - min + 1));
};
function generate(low, hi, signs){
    let tokens = [];
    sign = signs[Math.floor(Math.random() * signs.length)]
    num = rand(low, hi);
    tokens.push(num);
    tokens.push(sign);
    num = rand(low, hi);
    tokens.push(num);

    solution = eval(tokens.join(" "));
    return {
        "solution": solution,
        "eq": tokens.join(" "),
        "tokens": tokens
    }
}

function wygenerujNowe(){
    s = {};
    s.min = 1*$('[name=min]').val();
    s.max = 1*$('[name=max]').val();
    s.elements = 1*$('[name=elements]').val();
    s.signs = [];
    if ($("#s_plus").is(":checked")){ s.signs.push("+"); }
    if ($("#s_minus").is(":checked")){ s.signs.push("-"); }
    if ($("#s_mul").is(":checked")){ s.signs.push("*"); }

    nums = [];
    for( i = 0; i < s.elements; i++){
        nums.push(generate(s.min, s.max, s.signs, s.elements));
    }

    tmpl = $('.teq').html();
    tsol = $('.tsol').html();
    $('.eqs, .sol').text("");
    for(i=0; i< nums.length; i++){
        eq = nums[i];
        $('.eqs').append(
            tmpl
                .replace('LP', i+1)
                .replace('NUM1', eq.tokens[0])
                .replace('NUM2', eq.tokens[2])
                .replace('SIGN', eq.tokens[1].replace("*", "&bull;"))
        );
        $('.sol').append(
            tsol.replace('LP', i+1).replace('NUM', eq.solution)
        )
    }
}

$(document).ready(() => {
    $(document).on('click', '#generuj', e => {e.preventDefault(); wygenerujNowe()});
    wygenerujNowe();
})

