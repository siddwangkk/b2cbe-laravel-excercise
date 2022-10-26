export const renderErrorMessage = (data) => {
    Object.keys(data).forEach( ele => {
        switch(ele) {
            case "name": {
                return $('#name-error-msg').text(data[ele][0])
            }
            case "url": {
                return data[ele][0] === "The url field is required." ?
                    $('#url-error-msg').text(data[ele][0]) :
                    $('#url-error-msg').text("Invalid URL format.")
            }
            case "price": {
                return $('#price-error-msg').text(data[ele][0])
            }
            case "qty": {
                return $('#qty-error-msg').text(data[ele][0])
            }
        }
    })
}
