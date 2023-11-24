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
}

export default LeadService;
