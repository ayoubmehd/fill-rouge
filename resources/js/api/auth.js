export const login = async ({ email, password }) => {
    try {
        const res = axios.post("/login", { email, password });
        return [res, null];
    } catch (err) {
        return [null, err];
    }
}

export const logout = async () => {
    try {
        const res = axios.post("/logout");
        return [res, null];
    } catch (err) {
        return [null, err];
    }
}

export const register = async ({ name, email, password, password_confirmation }) => {
    try {
        const csrf = await axios.get('/sanctum/csrf-cookie');
        const res = axios.post("/register", { name, email, password, password_confirmation });
        return [res, null];
    } catch (err) {
        return [null, err];
    }
}