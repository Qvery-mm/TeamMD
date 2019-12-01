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
        private Entry Login;
        private Entry Password;
        private Label Warning;

        private void LogIn()
        {
            CurrentClient = null;
            Warning = new Label();

            Login = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand
            };

            Password = new Entry
            {
                HorizontalOptions = LayoutOptions.FillAndExpand,
                IsPassword = true
            };

            Clear();
            CentralWindow.BackgroundColor = Color.White;

            Frame frame = new Frame
            {
                CornerRadius = 20,
                HasShadow = true,
                BackgroundColor = StyleColor.color3,
                Margin = new Thickness(40, 30, 40, 40),
            };

            StackLayout stack = new StackLayout
            {
                Orientation = StackOrientation.Vertical
            };

            CentralWindow.Children.Add(stack);
            stack.Children.Add(new Frame
            {
                Padding = 0,
                HasShadow = true,
                Content = new Label
                {
                    Text = "    EcoLab",
                    TextColor = Color.White,
                    FontAttributes = FontAttributes.Bold,
                    HorizontalOptions = LayoutOptions.Fill,
                    FontSize = 45,
                    BackgroundColor = StyleColor.color1,
                    VerticalTextAlignment = TextAlignment.Center,
                    HeightRequest = 150

                }
            });

            StackLayout stEnt = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
                HorizontalOptions = LayoutOptions.Fill
            };

            frame.Content = stEnt;

            stack.Children.Add(frame);
            stEnt.Children.Add(new Label
            {
                Text = "Войти",
                HorizontalOptions = LayoutOptions.Fill,
                HorizontalTextAlignment = TextAlignment.Center,
                FontSize = 25,
                FontAttributes = FontAttributes.Bold
            });
            stEnt.Children.Add(Warning);
            stEnt.Children.Add(CreateNewSrack(-1, "Логин", Login));
            stEnt.Children.Add(CreateNewSrack(-1, "Пароль", Password));

            StackLayout butst = new StackLayout
            {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.Fill,
                Padding = new Thickness(15, 10, 10, 5)
            };

            stEnt.Children.Add(butst);

            Frame frameR = new Frame
            {
                CornerRadius = 10, 
                BackgroundColor = StyleColor.color2,
                HasShadow = true,
                Padding = 0
            };

            Frame frameE = new Frame
            {
                CornerRadius = 10,
                BackgroundColor = StyleColor.color2,
                HasShadow = true,
                Padding = 0
            };

            Button regBut = new Button
            {
                Text = "Регистрация",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = StyleColor.color2
            };

            frameR.Content = regBut;

            Button entBut = new Button {
                Text = "Войти",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = StyleColor.color2
            };

            frameE.Content = entBut;

            regBut.Clicked += regButtonEvent;
            entBut.Clicked += entButtonEvent;
            butst.Children.Add(frameR);
            butst.Children.Add(frameE);
        }

        private void regButtonEvent(object sender, EventArgs e)
        {
            RegistrationClient();
        }

        private void WarningText(string text)
        {
            if (text == null)
            {
                Warning = new Label();
            }
            else
            {
                Warning.Text = text;
                Warning.TextColor = Color.Red;
                Warning.HorizontalOptions = LayoutOptions.Fill;
                Warning.HorizontalTextAlignment = TextAlignment.Center;
            }
        }

        private void entButtonEvent(object sender, EventArgs e)
        {
            if ((Login.Text == null || Login.Text == "") && (Password.Text == null || Password.Text == ""))
            {
                WarningText("Введите логин и пароль!!!");
            }
            else if ((Login.Text == null || Login.Text == "") && (Password.Text != null || Password.Text != ""))
            {
                WarningText("Введите логин!!");
            }
            else if ((Login.Text != null || Login.Text != "") && (Password.Text == null || Password.Text == ""))
            {
                WarningText("Введите пароль!!");
            }
            else
            {
                Client client = FindClient(Login.Text, Password.Text);
                if (client == null)
                {
                    WarningText("Неверный логин или пароль");
                }
                else
                {
                    CurrentClient = client;
                    MenuPage();
                }
            }
        }

        private Client FindClient(string login, string password)
        {
            foreach (Client client in ListOfClient)
            {
                if (client.Login == login && client.Password == password)
                {
                    return client;
                }
            }
            return null;
        }
    }
}
