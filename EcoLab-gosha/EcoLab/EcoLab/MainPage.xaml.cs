using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace EcoLab
{
    public partial class MainPage : ContentPage
    {
        private Client CurrentClient;

        public MainPage()
        {
            InitializeComponent();
            LogIn();
        }

        private void Clear()
        {
            CentralWindow.Children.Clear();
        }

        private StackLayout CreateNewSrack(int row, string textForLabel, Entry entry)
        {
            StackLayout stLog = new StackLayout { Orientation = StackOrientation.Horizontal };
            if (row != -1)
            {
                Grid.SetColumn(stLog, 1);
                Grid.SetRow(stLog, row);
            }
            stLog.Children.Add(new Label
            {
                Text = textForLabel,
                FontAttributes = FontAttributes.Bold,
                VerticalOptions = LayoutOptions.Center
            });
            stLog.Children.Add(entry);
            return stLog;
        }

        private void AddNewClient(Client client)
        {
            ListOfClient.Add(client);
        }
    }
}
