export const getProductsApi = async () => {
    let myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");
    const requestOptions = {
      method: 'GET',
      credentials: "same-origin",
      redirect: 'follow',
      headers: myHeaders
    };
    const response = await fetch(`${location.origin}/api/products`, requestOptions)

    return response.json()
}