export const addPost = async (data) => {
    try {
        const response = await axios.post('/api/ctm-post/posts', data);
        return [response, null];
    } catch (err) {
        return [null, err];
    }
}