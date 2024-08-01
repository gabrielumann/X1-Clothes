function updateSales() {
    const dateRange = document.getElementById('date-range').value;
    let salesAmount;

    // Simulação de diferentes valores de vendas com base no intervalo de datas
    switch (dateRange) {
        case 'week':
            salesAmount = '$500.00';
            break;
        case 'month':
            salesAmount = '$2000.00';
            break;
        case 'six-months':
            salesAmount = '$12000.00';
            break;
        case 'all':
            salesAmount = '$50000.00';
            break;
        default:
            salesAmount = '$0.00';
    }

    document.getElementById('total-sales').innerText = salesAmount;
}

// Atualiza o valor de vendas ao carregar a página
window.onload = updateSales;
