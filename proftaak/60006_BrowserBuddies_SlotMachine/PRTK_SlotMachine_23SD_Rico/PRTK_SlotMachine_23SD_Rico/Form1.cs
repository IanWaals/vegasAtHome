using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.IO.Ports;

namespace PRTK_SlotMachine_23SD_Rico
{
    public partial class Form1 : Form
    {
        SerialPort serialPort;
        public Form1()
        {
            InitializeComponent();
            serialPort = new SerialPort("COM5",9600);
            try
            {
                serialPort.Open();
                Console.WriteLine("connected.");
            }
            catch
            {
                Console.WriteLine("Unable to open COM port - check it's not in use.");
            }
        }

        // Declaring Total, Bet and Credits
        public static long credits = 1000;
        public static long total = 0;
        public static int bet = 10;

        //Declaring each item

        public static int p1;
        public static int p2;
        public static int p3;
        public static int p4;
        public static int p5;
        public static int p6;
        public static int p7;
        public static int p8;
        public static int p9;
        public static int p10;
        public static int p11;
        public static int p12;
        public static int p13;
        public static int p14;
        public static int p15;

        int winnings = 0;

        private void Form1_Load(object sender, EventArgs e)
        {
            this.Text = "Vegas@Home - Slot Machine";

            pbxSlot1Roli.Image = Image.FromFile("1.png");
            pbxSlot2Roli.Image = Image.FromFile("1.png");
            pbxSlot3Roli.Image = Image.FromFile("1.png");
            pbxSlot4Roli.Image = Image.FromFile("1.png");
            pbxSlot5Roli.Image = Image.FromFile("1.png");
            pbxSlot6Roli.Image = Image.FromFile("1.png");
            pbxSlot7Roli.Image = Image.FromFile("1.png");
            pbxSlot8Roli.Image = Image.FromFile("1.png");
            pbxSlot9Roli.Image = Image.FromFile("1.png");
            pbxSlot10Roli.Image = Image.FromFile("1.png");
            pbxSlot11Roli.Image = Image.FromFile("1.png");
            pbxSlot12Roli.Image = Image.FromFile("1.png");
            pbxSlot13Roli.Image = Image.FromFile("1.png");
            pbxSlot14Roli.Image = Image.FromFile("1.png");
            pbxSlot15Roli.Image = Image.FromFile("1.png");
        }

        public static class IntUtil
        {
            private static Random random;
            private static void Init()
            {
                if (random == null) random = new Random();
            }
            public static int Random(int min, int max)
            {
                Init();
                return random.Next(min, max);
            }
        }

        private void btnSpinRoli_Click(object sender, EventArgs e)
        {
            if (credits >= bet)
            {
                credits = credits - bet;
                lblCreditsRoli.Text = credits.ToString();

                for (var i = 0; i < 10; i++)
                {
                    p1 = IntUtil.Random(1, 9);
                    p2 = IntUtil.Random(1, 9);
                    p3 = IntUtil.Random(1, 9);
                    p4 = IntUtil.Random(1, 9);
                    p5 = IntUtil.Random(1, 9);
                    p6 = IntUtil.Random(1, 9);
                    p7 = IntUtil.Random(1, 9);
                    p8 = IntUtil.Random(1, 9);
                    p9 = IntUtil.Random(1, 9);
                    p10 = IntUtil.Random(1, 9);
                    p11 = IntUtil.Random(1, 9);
                    p12 = IntUtil.Random(1, 9);
                    p13 = IntUtil.Random(1, 9);
                    p14 = IntUtil.Random(1, 9);
                    p15 = IntUtil.Random(1, 9);
                }

                if (pbxSlot1Roli.Image != null) pbxSlot1Roli.Image.Dispose();
                pbxSlot1Roli.Image = Image.FromFile(p1.ToString() + ".png");

                if (pbxSlot2Roli.Image != null) pbxSlot2Roli.Image.Dispose();
                pbxSlot2Roli.Image = Image.FromFile(p2.ToString() + ".png");

                if (pbxSlot3Roli.Image != null) pbxSlot3Roli.Image.Dispose();
                pbxSlot3Roli.Image = Image.FromFile(p3.ToString() + ".png");

                if (pbxSlot4Roli.Image != null) pbxSlot4Roli.Image.Dispose();
                pbxSlot4Roli.Image = Image.FromFile(p4.ToString() + ".png");

                if (pbxSlot5Roli.Image != null) pbxSlot5Roli.Image.Dispose();
                pbxSlot5Roli.Image = Image.FromFile(p5.ToString() + ".png");

                if (pbxSlot6Roli.Image != null) pbxSlot6Roli.Image.Dispose();
                pbxSlot6Roli.Image = Image.FromFile(p6.ToString() + ".png");

                if (pbxSlot7Roli.Image != null) pbxSlot7Roli.Image.Dispose();
                pbxSlot7Roli.Image = Image.FromFile(p7.ToString() + ".png");

                if (pbxSlot8Roli.Image != null) pbxSlot8Roli.Image.Dispose();
                pbxSlot8Roli.Image = Image.FromFile(p8.ToString() + ".png");

                if (pbxSlot9Roli.Image != null) pbxSlot9Roli.Image.Dispose();
                pbxSlot9Roli.Image = Image.FromFile(p9.ToString() + ".png");

                if (pbxSlot10Roli.Image != null) pbxSlot10Roli.Image.Dispose();
                pbxSlot10Roli.Image = Image.FromFile(p10.ToString() + ".png");

                if (pbxSlot11Roli.Image != null) pbxSlot11Roli.Image.Dispose();
                pbxSlot11Roli.Image = Image.FromFile(p11.ToString() + ".png");

                if (pbxSlot12Roli.Image != null) pbxSlot12Roli.Image.Dispose();
                pbxSlot12Roli.Image = Image.FromFile(p12.ToString() + ".png");

                if (pbxSlot13Roli.Image != null) pbxSlot13Roli.Image.Dispose();
                pbxSlot13Roli.Image = Image.FromFile(p13.ToString() + ".png");

                if (pbxSlot14Roli.Image != null) pbxSlot14Roli.Image.Dispose();
                pbxSlot14Roli.Image = Image.FromFile(p14.ToString() + ".png");

                if (pbxSlot15Roli.Image != null) pbxSlot15Roli.Image.Dispose();
                pbxSlot15Roli.Image = Image.FromFile(p15.ToString() + ".png");

                total = 0;

                #region Points distribution

                // Get results from playtable
                // Check which occurs
                // First Row
                if (p1 == 1 & p4 == 1 & p7 == 1 & p10 == 1 & p13 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 2 & p4 == 2 & p7 == 2 & p10 == 2 & p13 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 3 & p4 == 3 & p7 == 3 & p10 == 3 & p13 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 4 & p4 == 4 & p7 == 4 & p10 == 4 & p13 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 5 & p4 == 5 & p7 == 5 & p10 == 5 & p13 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 6 & p4 == 6 & p7 == 6 & p10 == 6 & p13 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 7 & p4 == 7 & p7 == 7 & p10 == 7 & p13 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 8 & p4 == 8 & p7 == 8 & p10 == 8 & p13 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 9 & p4 == 9 & p7 == 9 & p10 == 9 & p13 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // Second row
                if (p2 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p14 == 2)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p14 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 3 & p5 == 3 & p8 == 3 & p11 == 3 & p14 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 4 & p5 == 4 & p8 == 4 & p11 == 4 & p14 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 5 & p5 == 5 & p8 == 5 & p11 == 5 & p14 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 6 & p5 == 6 & p8 == 6 & p11 == 6 & p14 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 7 & p5 == 7 & p8 == 7 & p11 == 7 & p14 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 8 & p5 == 8 & p8 == 8 & p11 == 8 & p14 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 9 & p5 == 9 & p8 == 9 & p11 == 9 & p14 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // Third Row
                if (p3 == 1 & p6 == 1 & p9 == 1 & p12 == 1 & p15 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 2 & p6 == 2 & p9 == 2 & p12 == 2 & p15 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 3 & p6 == 3 & p9 == 3 & p12 == 3 & p15 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 4 & p6 == 4 & p9 == 4 & p12 == 4 & p15 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 5 & p6 == 5 & p9 == 5 & p12 == 5 & p15 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 6 & p6 == 6 & p9 == 6 & p12 == 6 & p15 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 7 & p6 == 7 & p9 == 7 & p12 == 7 & p15 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 8 & p6 == 8 & p9 == 8 & p12 == 8 & p15 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 9 & p6 == 9 & p9 == 9 & p12 == 9 & p15 == 9) 
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // UP, UP, MID, DOWN, DOWN
                if (p1 == 1 & p4 == 1 & p8 == 1 & p12 == 1 & p15 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 2 & p4 == 2 & p8 == 2 & p12 == 2 & p15 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 3 & p4 == 3 & p8 == 3 & p12 == 3 & p15 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 4 & p4 == 4 & p8 == 4 & p12 == 4 & p15 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 5 & p4 == 5 & p8 == 5 & p12 == 5 & p15 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 6 & p4 == 6 & p8 == 6 & p12 == 6 & p15 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 7 & p4 == 7 & p8 == 7 & p12 == 7 & p15 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 8 & p4 == 8 & p8 == 8 & p12 == 8 & p15 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 9 & p4 == 9 & p8 == 9 & p12 == 9 & p15 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // DOWN, DOWN, MID, UP, UP
                if (p3 == 1 & p6 == 1 & p8 == 1 & p10 == 1 & p13 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 2 & p6 == 2 & p8 == 2 & p10 == 2 & p13 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 3 & p6 == 3 & p8 == 3 & p10 == 3 & p13 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 4 & p6 == 4 & p8 == 4 & p10 == 4 & p13 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 5 & p6 == 5 & p8 == 5 & p10 == 5 & p13 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 6 & p6 == 6 & p8 == 6 & p10 == 6 & p13 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 7 & p6 == 7 & p8 == 7 & p10 == 7 & p13 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 8 & p6 == 8 & p8 == 8 & p10 == 8 & p13 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 9 & p6 == 9 & p8 == 9 & p10 == 9 & p13 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }


                // DOWN, MID, UP, MID, DOWN
                if (p3 == 1 & p5 == 1 & p7 == 1 & p11 == 1 & p15 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 2 & p5 == 2 & p7 == 2 & p11 == 2 & p15 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 3 & p5 == 3 & p7 == 3 & p11 == 3 & p15 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 4 & p5 == 4 & p7 == 4 & p11 == 4 & p15 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 5 & p5 == 5 & p7 == 5 & p11 == 5 & p15 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 6 & p5 == 6 & p7 == 6 & p11 == 6 & p15 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 7 & p5 == 7 & p7 == 7 & p11 == 7 & p15 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 8 & p5 == 8 & p7 == 8 & p11 == 8 & p15 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 9 & p5 == 9 & p7 == 9 & p11 == 9 & p15 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // UP, MID, DOWN, MID, UP
                if (p1 == 1 & p5 == 1 & p9 == 1 & p11 == 1 & p13 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 2 & p5 == 2 & p9 == 2 & p11 == 2 & p13 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 3 & p5 == 3 & p9 == 3 & p11 == 3 & p13 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 4 & p5 == 4 & p9 == 4 & p11 == 4 & p13 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 5 & p5 == 5 & p9 == 5 & p11 == 5 & p13 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 6 & p5 == 6 & p9 == 6 & p11 == 6 & p13 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 7 & p5 == 7 & p9 == 7 & p11 == 7 & p13 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 8 & p5 == 8 & p9 == 8 & p11 == 8 & p13 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 9 & p5 == 9 & p9 == 9 & p11 == 9 & p13 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // UP, MID, MID, MID, UP
                if (p1 == 1 & p5 == 1 & p8 == 1 & p11 == 1 & p13 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p13 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 3 & p5 == 3 & p8 == 3 & p11 == 3 & p13 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 4 & p5 == 4 & p8 == 4 & p11 == 4 & p13 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 5 & p5 == 5 & p8 == 5 & p11 == 5 & p13 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 6 & p5 == 6 & p8 == 6 & p11 == 6 & p13 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 7 & p5 == 7 & p8 == 7 & p11 == 7 & p13 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 8 & p5 == 8 & p8 == 8 & p11 == 8 & p13 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 9 & p5 == 9 & p8 == 9 & p11 == 9 & p13 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // UP, MID, MID, MID, DOWN
                if (p1 == 1 & p5 == 1 & p8 == 1 & p11 == 1 & p15 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p15 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 3 & p5 == 3 & p8 == 3 & p11 == 3 & p15 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 4 & p5 == 4 & p8 == 4 & p11 == 4 & p15 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 5 & p5 == 5 & p8 == 5 & p11 == 5 & p15 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 6 & p5 == 6 & p8 == 6 & p11 == 6 & p15 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 7 & p5 == 7 & p8 == 7 & p11 == 7 & p15 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 8 & p5 == 8 & p8 == 8 & p11 == 8 & p15 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p1 == 9 & p5 == 9 & p8 == 9 & p11 == 9 & p15 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // DOWN, MID, MID, MID, DOWN
                if (p3 == 1 & p5 == 1 & p8 == 1 & p11 == 1 & p15 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p15 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 3 & p5 == 3 & p8 == 3 & p11 == 3 & p15 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 4 & p5 == 4 & p8 == 4 & p11 == 4 & p15 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 5 & p5 == 5 & p8 == 5 & p11 == 5 & p15 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 6 & p5 == 6 & p8 == 6 & p11 == 6 & p15 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 7 & p5 == 7 & p8 == 7 & p11 == 7 & p15 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 8 & p5 == 8 & p8 == 8 & p11 == 8 & p15 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 9 & p5 == 9 & p8 == 9 & p11 == 9 & p15 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // DOWN, MID, MID, MID, UP
                if (p3 == 1 & p5 == 1 & p8 == 1 & p11 == 1 & p13 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 2 & p5 == 2 & p8 == 2 & p11 == 2 & p13 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 3 & p5 == 3 & p8 == 3 & p11 == 3 & p13 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 4 & p5 == 4 & p8 == 4 & p11 == 4 & p13 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 5 & p5 == 5 & p8 == 5 & p11 == 5 & p13 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 6 & p5 == 6 & p8 == 6 & p11 == 6 & p13 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 7 & p5 == 7 & p8 == 7 & p11 == 7 & p13 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 8 & p5 == 8 & p8 == 8 & p11 == 8 & p13 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p3 == 9 & p5 == 9 & p8 == 9 & p11 == 9 & p13 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // MID, UP, UP, UP, MID
                if (p2 == 1 & p4 == 1 & p7 == 1 & p10 == 1 & p14 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 2 & p4 == 2 & p7 == 2 & p10 == 2 & p14 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 3 & p4 == 3 & p7 == 3 & p10 == 3 & p14 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 4 & p4 == 4 & p7 == 4 & p10 == 4 & p14 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 5 & p4 == 5 & p7 == 5 & p10 == 5 & p14 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 6 & p4 == 6 & p7 == 6 & p10 == 6 & p14 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 7 & p4 == 7 & p7 == 7 & p10 == 7 & p14 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 8 & p4 == 8 & p7 == 8 & p10 == 8 & p14 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 9 & p4 == 9 & p7 == 9 & p10 == 9 & p14 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                // MID, DOWN, DOWN, DOWN, MID
                if (p2 == 1 & p6 == 1 & p9 == 1 & p12 == 1 & p14 == 1)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 2 & p6 == 2 & p9 == 2 & p12 == 2 & p14 == 2)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 3 & p6 == 3 & p9 == 3 & p12 == 3 & p14 == 3)
                {
                    winnings = winnings + 140;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 4 & p6 == 4 & p9 == 4 & p12 == 4 & p14 == 4)
                {
                    winnings = winnings + 200;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 5 & p6 == 5 & p9 == 5 & p12 == 5 & p14 == 5)
                {
                    winnings = winnings + 130;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 6 & p6 == 6 & p9 == 6 & p12 == 6 & p14 == 6)
                {
                    winnings = winnings + 110;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 7 & p6 == 7 & p9 == 7 & p12 == 7 & p14 == 7)
                {
                    winnings = winnings + 300;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 8 & p6 == 8 & p9 == 8 & p12 == 8 & p14 == 8)
                {
                    winnings = winnings + 120;
                    lblWinRoli.Text = winnings.ToString();
                }
                if (p2 == 9 & p6 == 9 & p9 == 9 & p12 == 9 & p14 == 9)
                {
                    winnings = winnings + 150;
                    lblWinRoli.Text = winnings.ToString();
                }

                #endregion
            }
        }

        private void btnRedeemRoli_Click(object sender, EventArgs e)
        {
            if (serialPort.IsOpen)
            {
                string amountToWrite = lblWinRoli.Text; // Get the text from the amount TextBox
                serialPort.Write(amountToWrite); // Write the text to the SerialPort
                Console.WriteLine(amountToWrite);
            }
        }
    }
}
