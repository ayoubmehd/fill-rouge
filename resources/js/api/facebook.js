export const getUserPages = async () => {
    return await axios.get("/api/facebook/get-user-pages");
}