import axios from "axios";
import { useToast } from "vue-toast-notification";

class LeadService {
    async sendLead(leadForm) {
        const toast = useToast();

        const lead = await axios
            .post("/api/leads", leadForm)
            .then(({ data }) => {
                toast.success("Cadastro realizado com sucesso");
                return data;
            })
            .catch(({ response }) => {
                toast.error(response.data.message);
                return response;
            });

        return lead;
    }

    async getLeads() {
        const token = localStorage.getItem("token");

        const { data } = await axios.get("/api/leads", {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

        return data;
    }

    async sendContactEmail(id) {
        const toast = useToast();

        const token = localStorage.getItem("token");
        await axios
            .post(
                `/api/leads/${id}`,
                {},
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then(() => {
                toast.success("Email enviado com sucesso!");
            })
            .catch(({ response }) => {
                toast.error(response.data.message);
                return response;
            });
    }
}

export default LeadService;
