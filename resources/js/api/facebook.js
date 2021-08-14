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
export const createComment = async (pageId, postId, comment) => {
    try {
        const response = await axios.post(`/api/facebook/create-comment/${pageId}/${postId}`, {
            comment
        });
        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}
export const replyToComment = async (pageId, commentId, comment) => {
    try {
        const response = await axios.post(`/api/facebook/create-comment/${pageId}/${commentId}`, {
            comment
        });
        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}