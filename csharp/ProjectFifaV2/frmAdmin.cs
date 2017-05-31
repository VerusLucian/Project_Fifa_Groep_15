using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace ProjectFifaV2
{
    public partial class frmAdmin : Form
    {
        private DatabaseHandler dbh;
        private OpenFileDialog opfd;

        DataTable table;

        public frmAdmin()
        {
            dbh = new DatabaseHandler();
            table = new DataTable();
            this.ControlBox = false;
            InitializeComponent();
        }

        private void btnAdminLogOut_Click(object sender, EventArgs e)
        {
            txtQuery.Text = null;
            txtPath = null;
            dgvAdminData.DataSource = null;
            Hide();
        }

        private void btnExecute_Click(object sender, EventArgs e)
        {
            if (txtQuery.TextLength > 0)
            {
                ExecuteSQL(txtQuery.Text);
            }
        }

        private void ExecuteSQL(string selectCommandText)
        {
            dbh.TestConnection();
            SqlDataAdapter dataAdapter = new SqlDataAdapter(selectCommandText, dbh.GetCon());
            dataAdapter.Fill(table);
            dgvAdminData.DataSource = table;
        }

        private void btnSelectFile_Click(object sender, EventArgs e)
        {
            txtPath.Text = null;
            
            string path = GetFilePath();

            if (CheckExtension(path, "csv"))
            {
                txtPath.Text = path;
            }
            else
            {
                MessageHandler.ShowMessage("The wrong filetype is selected.");
            }
        }

        private void btnLoadData_Click(object sender, EventArgs e)
        {
            // This is letting us to load in a CSV file.

            if (!(txtPath.Text == null))
            {
                string sql = "BULK INSERT TblTeams" +
               " FROM '" + txtPath.Text + "'" +
                "WITH" +
                "(" +
                   " FIRSTROW = 2," +
                   " FIELDTERMINATOR = ',', " +
                   " ROWTERMINATOR = '\n', " +
                   " TABLOCK" +
                ")";

                dbh.OpenConnectionToDB();

                ExecuteSQL(sql);

                dbh.CloseConnectionToDB();

                // This disables a couple of buttons and/or text boxes to be sure that an exception won't happen.

                btnExecute.Enabled = true;
                btnLoadData.Enabled = false;
                btnSelectFile.Enabled = false;

                txtQuery.Enabled = true;
                txtPath.Enabled = false;
            }
            else
            {
                // This shows a message if nothing is selected.

                MessageHandler.ShowMessage("No filename selected.");
            }
        }

        private string GetFilePath()
        {
            string filePath = "";
            opfd = new OpenFileDialog();

            opfd.Multiselect = false;

            if (opfd.ShowDialog() == DialogResult.OK)
            {
                filePath = opfd.FileName;
            }

            return filePath;
        }

        private bool CheckExtension(string fileString, string extension)
        {
            int extensionLength = extension.Length;
            int strLength = fileString.Length;

            string ext = fileString.Substring(strLength - extensionLength, extensionLength);

            if (ext == extension)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
