export const getUserPages = async () => {
    return await axios.get("/api/facebook/get-user-pages");
}
export const getPostComments = async (pageId, postId) => {
    try {
        const response = await axios.get(`/api/facebook/get-post-comments/${pageId}/${postId}`);
        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}