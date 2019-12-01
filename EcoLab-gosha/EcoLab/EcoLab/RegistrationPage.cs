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
        private Entry LogR;
        private Entry PasR;
        private Entry DoubPasR;
        private Entry PhonR;
        private Entry EmailR;
        private Entry GeopR;

        public void RegistrationClient()
        {
            Warning = new Label();
            LogR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };
            PasR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            DoubPasR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            PhonR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            EmailR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            GeopR = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            Clear();
            CentralWindow.Children.Add(new Label
            {
                Text = "    EcoLab",
                TextColor = Color.White,
                FontAttributes = FontAttributes.Bold,
                HorizontalOptions = LayoutOptions.Fill,
                FontSize = 45,
                BackgroundColor = Color.FromRgb(13, 199, 10),
                VerticalTextAlignment = TextAlignment.Center,
                HeightRequest = 150
            });

            Frame frame = new Frame
            {
                CornerRadius = 20,
                HasShadow = true,
                Margin = new Thickness(30, 40, 30, 30),
                BackgroundColor = StyleColor.color3
            };

            StackLayout stackOfRegForm = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
                Padding = 5
            };

            frame.Content = stackOfRegForm;

            stackOfRegForm.Children.Add(Warning);
            stackOfRegForm.Children.Add(new Label
            {
                TextDecorations = TextDecorations.Underline,
                FontAttributes = FontAttributes.Bold,
                FontSize = 19,
                Text = "Персональные данные"
            });

            stackOfRegForm.Children.Add(CreateNewSrack(-1, "Логин", LogR));
            stackOfRegForm.Children.Add(CreateNewSrack(-1, "Пароль", PasR));
            stackOfRegForm.Children.Add(CreateNewSrack(-1, "Повторите Пароль", DoubPasR));
            stackOfRegForm.Children.Add(new Label
            {
                TextDecorations = TextDecorations.Underline,
                FontAttributes = FontAttributes.Bold,
                FontSize = 19,
                Text = "Контактная информация"
            });
            stackOfRegForm.Children.Add(CreateNewSrack(-1, "Телефон", PhonR));
            stackOfRegForm.Children.Add(CreateNewSrack(-1, "E-mail", EmailR));
            stackOfRegForm.Children.Add(CreateNewSrack(-1, "Адрес", GeopR));

            Button button = new Button
            {
                CornerRadius = 10,
                BackgroundColor = StyleColor.color2,
                Text = "Завершить"
            };

            button.Clicked += EndOfRegistrationEvent;

            stackOfRegForm.Children.Add(button);
            CentralWindow.Children.Add(frame);
        }

        private void EndOfRegistrationEvent(object sender, EventArgs e)
        {
            try
            {
                if ((LogR.Text == "" || LogR.Text == null) || (PasR.Text == "" || PasR.Text == null) || (DoubPasR.Text == "" || DoubPasR.Text == null) || (PhonR.Text == "" || PhonR.Text == null) || (EmailR.Text == "" || EmailR.Text == null) || (GeopR.Text == "" || GeopR.Text == null))
                {
                    WarningText("Не все поля заполнены");
                }
                else if (PasR.Text != DoubPasR.Text)
                {
                    WarningText("Пароли не совпадают");
                }
                //else if ((PhonR.Text[0] != '+' && int.Parse(PhonR.Text.Substring(1)) == -1 && PhonR.Text.Length != 12) || (int.Parse(PhonR.Text) == -1 && PhonR.Text.Length != 11))
                //{
                //    WarningText("Неправильно введен номер телефона");
                //}
                else if (EmailR.Text.IndexOf('@') == -1 || EmailR.Text.IndexOf('.') == -1)
                {
                    WarningText("Непраильно введена почта");
                }   
                else
                {
                    Client client = new Client
                    {
                        Login = LogR.Text,
                        Password = PasR.Text,
                        Tel_number = PhonR.Text,
                        Email = EmailR.Text,
                        Geopos = GeopR.Text,
                        Score = 0
                    };
                    AddNewClient(client);
                    LogIn();
                }
            }
            catch
            {
                WarningText("Неправильно указан номер телефона");
            }
        }
    }
}
