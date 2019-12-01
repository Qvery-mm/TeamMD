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
        private ColumnDefinition colWithMenu = new ColumnDefinition { Width = 0 };
        private StackLayout workPlace = new StackLayout { };
        private ScrollView scroll;

        public void MenuPage()
        {
            Clear();
            NewsFeed();
            CentralWindow.BackgroundColor = Color.FromRgb(13, 199, 10);

            Grid gridControl = new Grid
            {
                HorizontalOptions = LayoutOptions.Fill,
                VerticalOptions = LayoutOptions.FillAndExpand
            };

            RowDefinitionCollection rd = gridControl.RowDefinitions;
            for (int i = 0; i < 2; i++)
            {
                if (i == 0)
                    rd.Add(new RowDefinition
                    {
                        Height = 50
                    });

                else
                    rd.Add(new RowDefinition
                    {
                        Height = new GridLength(1, GridUnitType.Star)
                    });
            }
             
            CentralWindow.Children.Add(gridControl);
            Grid TopGrid = new Grid
            {
                BackgroundColor = Color.FromRgb(13, 199, 10),
                HorizontalOptions = LayoutOptions.Fill
            };

            ColumnDefinitionCollection cdt = TopGrid.ColumnDefinitions;
            cdt.Add(new ColumnDefinition
            {
                Width = new GridLength(1, GridUnitType.Star)
            });

            cdt.Add(new ColumnDefinition());
            Grid.SetRow(TopGrid, 0);

            StackLayout topStack = new StackLayout
            {
                Orientation = StackOrientation.Horizontal, BackgroundColor = Color.FromRgb(13, 199, 10)
            };

            Grid.SetColumn(topStack, 0);
            TopGrid.Children.Add(topStack);

            gridControl.Children.Add(TopGrid);
            
            Button butOpen = new Button
            {
                Text = "___",
                TextColor = Color.White,
                WidthRequest = 50,
                BackgroundColor = Color.FromRgb(13, 199, 10)
            };

            butOpen.Clicked += OpenMenu;
            topStack.Children.Add(butOpen);
            Label log = new Label
            {
                TextColor = Color.White,
                FontSize = 18,
                VerticalTextAlignment = TextAlignment.Center,
                Text = "ECOLAB",
                VerticalOptions = LayoutOptions.Center,
                FontAttributes = FontAttributes.Bold
            };
            topStack.Children.Add(log);

            Button user = new Button
            {
                Margin = 5,
                HorizontalOptions = LayoutOptions.End,
                Text = CurrentClient.Login,
                BackgroundColor = Color.FromRgb(13, 199, 10),
                BorderColor = Color.White,
                BorderWidth = 0.5,
                CornerRadius = 10,
                TextColor = Color.White
            };
            user.Clicked += CreateUserPage;
            Grid.SetColumn(user, 1);
            TopGrid.Children.Add(user);

            Grid grid = new Grid
            {
                HorizontalOptions = LayoutOptions.Fill,
                VerticalOptions = LayoutOptions.FillAndExpand,
                BackgroundColor = Color.FromRgb(9, 83, 148)
            };
            Grid.SetRow(grid, 1);
            gridControl.Children.Add(grid);

            ColumnDefinitionCollection cd = grid.ColumnDefinitions;
            for (int i = 0; i < 2; i++)
            {
                if (i == 0)
                {
                    cd.Add(colWithMenu);
                }
                else
                {
                    cd.Add(new ColumnDefinition
                    {
                        Width = new GridLength(1, GridUnitType.Star)
                    });
                }
            }

            StackLayout stack = CreateMenu();
            Grid.SetColumn(stack, 0);
            grid.Children.Add(stack);


            scroll = new ScrollView
            {
                HorizontalOptions = LayoutOptions.Fill,
                VerticalOptions = LayoutOptions.FillAndExpand,
                BackgroundColor = Color.White
            };

            Grid.SetColumn(scroll, 1);
            scroll.Content = workPlace;
            grid.Children.Add(scroll);
        }

        private StackLayout CreateMenu() 
        {
            StackLayout stack = new StackLayout
            {
                HorizontalOptions = LayoutOptions.Fill,
                Orientation = StackOrientation.Vertical
            };

            Button but = new Button();
            but = CreateButtonForMenu("Главная");
            but.Clicked += CreateNewsFeeds;
            stack.Children.Add(but);
            but = CreateButtonForMenu("Статьи");
            but.Clicked += CreateProblem;
            stack.Children.Add(but);
            but = CreateButtonForMenu("Новости");
            //but.Clicked += CreateNews;
            stack.Children.Add(but);
            but = CreateButtonForMenu("События");
            but.Clicked += CreateEnum;
            stack.Children.Add(but);
            but = CreateButtonForMenu("Профиль");
            but.Clicked += CreateUserPage;
            stack.Children.Add(but);
            stack.Children.Add(CreateButtonForMenu("Контакты"));
            but = CreateButtonForMenu("Выйти");
            but.Clicked += GoToStart;
            stack.Children.Add(but);
            return stack;
        }

        private void CreateNewsFeeds(object sender, EventArgs e)
        {
            NewsFeed();
        }

        private void CreateProblem(object sender, EventArgs e)
        {
            ProblemPage();
        }

        private Button CreateButtonForMenu(string text)
        {
            return new Button
            {
                BackgroundColor = Color.FromRgb(9, 83, 148),
                HorizontalOptions = LayoutOptions.Fill,
                Text = text,
                TextColor = Color.White
            };
        }

        private void CreateEnum(object sender, EventArgs e)
        {
            EventPage();
        }

        private void GoToStart(object sender, EventArgs e)
        {
            ClMenu();
            LogIn();
        }

        private void CreateUserPage(object sender, EventArgs e)
        {
            ClMenu();
            workPlace.Children.Clear();
            OwnAccount();
        }

        private void OpenMenu(object sender, EventArgs e)
        {
            if (colWithMenu.Width.Value == 0)
                OpMenu();
            else if (colWithMenu.Width.Value == 200)
            {
                ClMenu();
            }
        }

        private void OpMenu()
        {
            colWithMenu.Width = 200;
        }

        private void ClMenu()
        {
            colWithMenu.Width = 0;
        }
    }
}
