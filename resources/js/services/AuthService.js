class AuthService {
    async login(formLogin) {
        const { data } = await axios.post(
            "/api/login",
            { ...formLogin, device_name: "web" },
            {}
        );
        localStorage.setItem("token", data.token);
    }

    async logout() {
        const token = localStorage.getItem("token");

        const { data } = await axios.post(
            "/api/logout",
            {},
            {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            }
        );

        localStorage.removeItem("token");

        return data;
    }
}

export default AuthService;
