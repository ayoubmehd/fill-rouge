export const addPost = async (data) => {
    try {
        const response = await axios.post('/api/ctm-post/posts', data);
        return [response, null];
    } catch (err) {
        return [null, err];
    }
}
export const getAllPosts = async (page = 1) => {
    try {
        const response = await axios.get(`/api/ctm-post/posts?page=${page}`);
        return [response.data, null];
    } catch (err) {
        return [null, err];
    }
}
export const getSinglePost = async (id) => {
    try {
        const response = await axios.get(`/api/ctm-post/posts/${id}`);
        return [response.data, null];
    } catch (err) {
        return [null, err];
    }
}