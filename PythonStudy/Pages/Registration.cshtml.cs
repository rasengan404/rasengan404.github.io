using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Data.Sql;
using System.Data.SqlClient;

namespace PythonStudy.Pages
{
    public class RegistrationModel : PageModel
    {
        public UserInfo userInfo = new UserInfo();
        public String errorMessage = "";
        public String successMessage = "";
        
        public void OnGet()
        {
        }

        public void OnPost()
        {
            userInfo.username = Request.Form["username"];
            userInfo.email = Request.Form["email"];
            userInfo.password = Request.Form["password"];

            if (userInfo.username.Length == 0 || userInfo.email.Length == 0 ||
                userInfo.password.Length == 0)
            {
                errorMessage = "All the fields are required!";
                return;
            }

            try
            {
                String connectionString = "Data Source=.\\sqlexpress;Initial Catalog=CollegeProjectDB;Integrated Security=True";
                using (SqlConnection connection = new SqlConnection(connectionString))
                {
                    connection.Open();
                    String sql = "INSERT INTO users " +
                        "(username, email, password) VALUES " +
                        "(@username, @email, @password);";

                    using (SqlCommand command = new SqlCommand(sql, connection))
                    {
                        command.Parameters.AddWithValue("@username", userInfo.username);
                        command.Parameters.AddWithValue("@email", userInfo.email);
                        command.Parameters.AddWithValue("@password", userInfo.password);

                        command.ExecuteNonQuery();
                    }
                }
            }
            catch(Exception ex)
            {
                errorMessage = ex.Message;
                return;
            }

            userInfo.username = "";
            userInfo.email = "";
            userInfo.password = "";
            successMessage = "You have successfully registrated!";

            Thread.Sleep(2000);
            Response.Redirect("/Users");
        }
    }
}
