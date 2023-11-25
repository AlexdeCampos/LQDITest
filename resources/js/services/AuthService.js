import { useToast } from "vue-toast-notification";

class AuthService {
    async login(formLogin) {
        const toast = useToast();
        const { data } = await axios
            .post("/api/login", { ...formLogin, device_name: "web" }, {})
            .catch(({ response }) => {
                toast.error(response.data.message);
                return response;
            });

        if (data.token) {
            localStorage.setItem("token", data.token);
        }
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
