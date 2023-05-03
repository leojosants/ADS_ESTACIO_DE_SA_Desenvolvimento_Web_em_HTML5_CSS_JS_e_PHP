// 
var num_dia = new Date().getDay();
var dia;

switch (num_dia) {
    case 0:
        dia = 'Domingo'
        break;

    case 1:
        dia = 'Segunda-feira'
        break;

    case 2:
        dia = 'Terca-feira'
        break;

    case 3:
        dia = 'Quarta-feira'
        break;

    case 4:
        dia = 'Quinta-feira'
        break;

    case 5:
        dia = 'Sexta-feira'
        break;

    default:
        dia = 'Sábado'
        break;
}

console.log(dia);
