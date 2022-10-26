
const getAllItems = async () => {
    const fetchResult = await fetch('/api/v1/items')
    const jsonResult = await fetchResult.json()

    return jsonResult.data
}

const renderAllItems = (items) => {
    const itemsFragment = new DocumentFragment()

    items.forEach(item => {
        const rowDiv = document.createElement('tr')
        rowDiv.classList.add('pb-3')
        rowDiv.innerHTML = `
            <td class="text-center"><input class="form-check-input"
                type="checkbox" name="item" data-value="${item.price}" data-qty="${item.qty}"></td>
            <td class="text-center">${item.id}</td>
            <td class="text-center">
                <a href="/items/${item.id}"> ${item.name}</a>
            </td>
            <td>
                <a href="${item.url}" target="_blank"> ${item.url}</a>
            </td>
            <td class="d-flex justify-content-between">
                <p class="mb-0 ms-3">$</p>
                <p class="text-end mb-0">${parseFloat(item.price).toLocaleString('en')}</p>
                </td>
            <td class="text-center">${item.qty}</td>
        `
        itemsFragment.append(rowDiv)
    })
    $('#items-tbody').append(itemsFragment)
    const checkboxs = document.getElementsByName('item')
    checkboxs.forEach(checkbox => {
        checkbox.addEventListener('click', showTotalUSD)
    })

}

const renderIndexPage = async () => {
    const items = await getAllItems()
    const selectAll = document.getElementById('select-all')
    selectAll.addEventListener('click', showTotalUSD)
    renderAllItems(items)
    setCurrencyCodeOption()
}

const deleteAllItems = async (e) => {
    e.preventDefault();
    e.stopPropagation();

    const fetchResult = await fetch('/api/v1/items', {
        method: 'DELETE'
    })
    const jsonResult = await fetchResult.json()

    if (jsonResult.status === "success") {
        return window.location = "/items"
    }
    else {
        return window.location = "/404.html"
    }
}

const goToDetailPage = async(e, id) => {
    e.preventDefault()
    e.stopPropagation()

    return window.location = `/items/${id}`
}

const goToCreatePage = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    return window.location = "/items/create"
}

const toggle = (source) => {

    const checkboxes = document.getElementsByName('item');
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked
    })
}

const sumSelectItemsUSD = () => {
    const items =  Array.from(document.getElementsByName('item'))
    const totalUSD = items.reduce( (acc, cur) => {
        if (cur.checked) acc += parseFloat(cur.dataset.value.replace(',', '')) * parseFloat(cur.dataset.qty)
        return acc
    }, 0)
    return totalUSD.toFixed(2)
}

const showTotalUSD = () => {
    const totalUSD = sumSelectItemsUSD()
    const totalDiv = document.getElementById('total-usd')
    const totletitle = document.getElementById('total-title')
    totletitle.innerHTML = 'Total&nbsp;&nbsp;&nbsp;USD'
    totalDiv.textContent = totalUSD
}

const getExchangeRate = async() => {
    const fetchResult = await fetch('/api/v1/exchange')
    const jsonResult = await fetchResult.json()

    return JSON.parse(jsonResult).data
}

const setCurrencyCodeOption = async () => {
    const currencies = await getExchangeRate()
    const currencyCode = currencies.map(currency => {
        return {code: currency.code, rate: currency.rate}
    })
    const selectFagment = new DocumentFragment()
    currencyCode.forEach(currency => {
        const codeOption = document.createElement('option')
        codeOption.value = currency.rate
        codeOption.textContent = currency.code
        selectFagment.append(codeOption)
    })
    $('#currency-code').append(selectFagment)
}

const renderCalculator = async () => {
    const totalUSD = sumSelectItemsUSD()
    // const currencies = await getExchangeRate()
    // const twdRate = currencies.filter( currency => currency.code === 'TWD')[0].rate
    const exchangeDiv = document.getElementById('total-exchange')
    const exchangeTitle = document.getElementById('exchange-title')
    const currency = document.getElementById('currency-code')
    // console.log(currency.selectIndex)
    const currencyCode = currency.options[currency['selectedIndex']].text
    exchangeTitle.innerHTML = `------->&nbsp;&nbsp;&nbsp;&nbsp;${currencyCode} `
    exchangeDiv.textContent = Math.floor(parseFloat(totalUSD) * parseFloat(currency.value))

}

$('#delete-all-btn').on('click', deleteAllItems)
$('#add-item-btn').on('click', goToCreatePage)
$('#calculate-btn').on('click', renderCalculator)


renderIndexPage()

